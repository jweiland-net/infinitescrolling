<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/infinitescrolling.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Infinitescrolling\EventListener;

use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Attribute\AsEventListener;
use TYPO3\CMS\Core\Http\ApplicationType;
use TYPO3\CMS\Core\Localization\LanguageServiceFactory;
use TYPO3\CMS\Core\Page\AssetCollector;
use TYPO3\CMS\Core\Page\Event\BeforeJavaScriptsRenderingEvent;
use TYPO3\CMS\Core\Site\Entity\Site;
use TYPO3\CMS\Core\Site\Set\SetRegistry;
use TYPO3\CMS\Core\SystemResource\Exception\SystemResourceException;
use TYPO3\CMS\Core\SystemResource\Publishing\SystemResourcePublisherInterface;
use TYPO3\CMS\Core\SystemResource\SystemResourceFactory;

#[AsEventListener(
    identifier: 'jweiland-infinitescrolling/add-frontend-javascript',
)]
final readonly class AddFrontendJavaScriptListener
{
    private const SET_NAME = 'jweiland/infinite-scrolling';

    private const JAVASCRIPT_PATH = 'EXT:infinitescrolling/Resources/Public/JavaScript/';

    /**
     * Infinite AJAX Scroll core, always required
     */
    private const IAS_FILES = [
        'infinitescrolling-callback' => 'Ias/callback.js',
        'infinitescrolling-ias' => 'Ias/jquery-ias.js',
    ];

    /**
     * IAS extensions, each enabled by the site setting "infinitescrolling.extension.<name>"
     */
    private const IAS_EXTENSION_FILES = [
        'spinner' => 'Ias/Extension/Spinner.js',
        'paging' => 'Ias/Extension/Paging.js',
        'trigger' => 'Ias/Extension/Trigger.js',
        'history' => 'Ias/Extension/History.js',
        'noneLeft' => 'Ias/Extension/NoneLeft.js',
    ];

    private const LANGUAGE_FILE = 'LLL:EXT:infinitescrolling/Resources/Private/Language/locallang.xlf:';

    public function __construct(
        private AssetCollector $assetCollector,
        private LanguageServiceFactory $languageServiceFactory,
        private SetRegistry $setRegistry,
        private SystemResourceFactory $systemResourceFactory,
        private SystemResourcePublisherInterface $systemResourcePublisher,
    ) {}

    public function __invoke(BeforeJavaScriptsRenderingEvent $event): void
    {
        // The event is dispatched four times per page. Hook into the non-priority inline call only,
        // which is rendered before the JavaScript files, so the files added here are still rendered.
        if (!$event->isInline() || $event->isPriority()) {
            return;
        }

        $request = $GLOBALS['TYPO3_REQUEST'] ?? null;
        if (!$request instanceof ServerRequestInterface || !ApplicationType::fromRequest($request)->isFrontend()) {
            return;
        }

        $site = $request->getAttribute('site');
        if (!$site instanceof Site || !$this->isSetActive($site)) {
            return;
        }

        // Site settings include the defaults of settings.definitions.yaml
        $settings = $site->getSettings();

        if ($settings->get('infinitescrolling.includeJQueryLibrary') === true) {
            $this->assetCollector->addJavaScript('infinitescrolling-jquery', self::JAVASCRIPT_PATH . 'jquery-3.7.1.min.js');
        }

        foreach (self::IAS_FILES as $identifier => $file) {
            $this->assetCollector->addJavaScript($identifier, self::JAVASCRIPT_PATH . $file);
        }

        $enabledExtensions = [];
        foreach (self::IAS_EXTENSION_FILES as $extension => $file) {
            $enabledExtensions[$extension] = $settings->get('infinitescrolling.extension.' . $extension) === true;
            if ($enabledExtensions[$extension]) {
                $identifier = 'infinitescrolling-' . strtolower($extension);
                $this->assetCollector->addJavaScript($identifier, self::JAVASCRIPT_PATH . $file);
            }
        }

        $this->assetCollector->addJavaScript('infinitescrolling-init', self::JAVASCRIPT_PATH . 'infinitescrolling.js');

        $languageService = $this->languageServiceFactory->createFromSiteLanguage($request->getAttribute('language'));

        $config = [
            'container' => (string)$settings->get('infinitescrolling.container', ''),
            'scrollContainer' => (string)$settings->get('infinitescrolling.scrollContainer', 'window'),
            'item' => (string)$settings->get('infinitescrolling.item', ''),
            'pagination' => (string)$settings->get('infinitescrolling.pagination', ''),
            'next' => (string)$settings->get('infinitescrolling.next', ''),
            'previous' => (string)$settings->get('infinitescrolling.previous', ''),
            'delay' => (int)$settings->get('infinitescrolling.delay', 0),
            'negativeMargin' => (int)$settings->get('infinitescrolling.negativeMargin', 0),
            'offset' => (int)$settings->get('infinitescrolling.offset', 0),
            'extensions' => $enabledExtensions,
            'loaderHtml' => (string)$settings->get('infinitescrolling.loader.html', ''),
            'loaderSrc' => $this->resolveLoaderSrc((string)$settings->get('infinitescrolling.loader.src', ''), $request),
            'noneLeftHtml' => (string)$settings->get('infinitescrolling.noneLeft.html', ''),
            'loadMoreText' => $languageService->sL(self::LANGUAGE_FILE . 'loadMoreItems'),
            'loadPrevText' => $languageService->sL(self::LANGUAGE_FILE . 'loadPrevItems'),
            'noneLeftText' => $languageService->sL(self::LANGUAGE_FILE . 'noneLeftItems'),
        ];

        $this->assetCollector->addInlineJavaScript(
            'infinitescrolling-config',
            'window.InfiniteScrollingConfig = ' . json_encode($config, JSON_THROW_ON_ERROR) . ';',
            [],
            ['csp' => true],
        );
    }

    /**
     * Checks whether the site set of this extension is assigned to the site,
     * either directly or as a dependency of another set (e.g. a site package set).
     */
    private function isSetActive(Site $site): bool
    {
        $sets = $site->getSets();
        if ($sets === []) {
            return false;
        }

        foreach ($this->setRegistry->getSets(...$sets) as $setDefinition) {
            if ($setDefinition->name === self::SET_NAME) {
                return true;
            }
        }

        return false;
    }

    private function resolveLoaderSrc(string $loaderSrc, ServerRequestInterface $request): string
    {
        if ($loaderSrc === '') {
            return '';
        }

        try {
            $publicResource = $this->systemResourceFactory->createPublicResource($loaderSrc);
            return (string)$this->systemResourcePublisher->generateUri($publicResource, $request);
        } catch (SystemResourceException) {
            return '';
        }
    }
}
