<?php

declare(strict_types=1);

namespace JWeiland\Infinitescrolling\EventListener;

use TYPO3\CMS\Core\Attribute\AsEventListener;
use TYPO3\CMS\Core\Page\AssetCollector;
use TYPO3\CMS\Core\Page\Event\BeforeJavaScriptsRenderingEvent;

#[AsEventListener(
    identifier: 'jweiland-infinitescrolling/add-frontend-javascript'
)]
final readonly class AddFrontendJavaScriptListener
{
    public function __construct(
        private AssetCollector $assetCollector,
    ) {}

    public function __invoke(BeforeJavaScriptsRenderingEvent $event): void
    {
        $this->assetCollector->addJavaScript('infinitescrolling-jquery', 'EXT:infinitescrolling/Resources/Public/JavaScript/jquery-3.7.1.min.js');
        $this->assetCollector->addJavaScript('infinitescrolling-callback', 'EXT:infinitescrolling/Resources/Public/JavaScript/Ias/callback.js');
        $this->assetCollector->addJavaScript('infinitescrolling-ias', 'EXT:infinitescrolling/Resources/Public/JavaScript/Ias/jquery-ias.js');
        $this->assetCollector->addJavaScript('infinitescrolling-spinner', 'EXT:infinitescrolling/Resources/Public/JavaScript/Ias/Extension/Spinner.js');
        $this->assetCollector->addJavaScript('infinitescrolling-paging', 'EXT:infinitescrolling/Resources/Public/JavaScript/Ias/Extension/Paging.js');
        $this->assetCollector->addJavaScript('infinitescrolling-trigger', 'EXT:infinitescrolling/Resources/Public/JavaScript/Ias/Extension/Trigger.js');
        $this->assetCollector->addJavaScript('infinitescrolling-history', 'EXT:infinitescrolling/Resources/Public/JavaScript/Ias/Extension/History.js');
    }
}
