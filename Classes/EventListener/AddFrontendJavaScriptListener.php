<?php

declare(strict_types=1);

namespace JWeiland\Infinitescrolling\EventListener;

use TYPO3\CMS\Core\Attribute\AsEventListener;
use TYPO3\CMS\Core\Http\ApplicationType;
use TYPO3\CMS\Core\Localization\LanguageServiceFactory;
use TYPO3\CMS\Core\Page\AssetCollector;
use TYPO3\CMS\Core\Page\Event\BeforeJavaScriptsRenderingEvent;

#[AsEventListener(
    identifier: 'jweiland-infinitescrolling/add-frontend-javascript'
)]
final readonly class AddFrontendJavaScriptListener
{
    public function __construct(
        private AssetCollector $assetCollector,
        private LanguageServiceFactory $languageServiceFactory,
    ) {}

    public function __invoke(BeforeJavaScriptsRenderingEvent $event): void
    {
        $request = $GLOBALS['TYPO3_REQUEST'];

        if (!ApplicationType::fromRequest($request)->isFrontend()) {
            return;
        }

        $this->assetCollector->addJavaScript('infinitescrolling-jquery', 'EXT:infinitescrolling/Resources/Public/JavaScript/jquery-3.7.1.min.js');
        $this->assetCollector->addJavaScript('infinitescrolling-callback', 'EXT:infinitescrolling/Resources/Public/JavaScript/Ias/callback.js');
        $this->assetCollector->addJavaScript('infinitescrolling-ias', 'EXT:infinitescrolling/Resources/Public/JavaScript/Ias/jquery-ias.js');
        $this->assetCollector->addJavaScript('infinitescrolling-spinner', 'EXT:infinitescrolling/Resources/Public/JavaScript/Ias/Extension/Spinner.js');
        $this->assetCollector->addJavaScript('infinitescrolling-paging', 'EXT:infinitescrolling/Resources/Public/JavaScript/Ias/Extension/Paging.js');
        $this->assetCollector->addJavaScript('infinitescrolling-trigger', 'EXT:infinitescrolling/Resources/Public/JavaScript/Ias/Extension/Trigger.js');
        $this->assetCollector->addJavaScript('infinitescrolling-history', 'EXT:infinitescrolling/Resources/Public/JavaScript/Ias/Extension/History.js');
        $this->assetCollector->addJavaScript('infinitescrolling-init', 'EXT:infinitescrolling/Resources/Public/JavaScript/infinitescrolling.js');

        $site = $request->getAttribute('site');
        $settings = $site?->getConfiguration()['settings']['infinitescrolling'] ?? [];

        $siteLanguage = $request->getAttribute('language');
        $languageService = $this->languageServiceFactory
            ->createFromSiteLanguage($siteLanguage);

        $config = [
            'container' => $settings['container'] ?? '',
            'scrollContainer' => $settings['scrollContainer'] ?? 'window',
            'item' => $settings['item'] ?? '',
            'pagination' => $settings['pagination'] ?? '',
            'next' => $settings['next'] ?? '',
            'previous' => $settings['previous'] ?? '',
            'delay' => (int)($settings['delay'] ?? 600),
            'negativeMargin' => (int)($settings['negativeMargin'] ?? 0),
            'offset' => (int)($settings['offset'] ?? 0),
            'loaderHtml' => $settings['loader']['html'] ?? '',
            'loadMoreText' => $languageService->sL(
                'LLL:EXT:infinitescrolling/Resources/Private/Language/locallang.xlf:loadMoreItems'
            ),
            'loadPrevText' => $languageService->sL(
                'LLL:EXT:infinitescrolling/Resources/Private/Language/locallang.xlf:loadPrevItems'
            ),
        ];

        $this->assetCollector->addInlineJavaScript(
            'infinitescrolling-config',
            'window.InfiniteScrollingConfig = ' . json_encode($config, JSON_THROW_ON_ERROR) . ';',
            [],
            ['csp' => true]
        );
    }
}
