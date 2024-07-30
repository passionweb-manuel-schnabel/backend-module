<?php

namespace Passionweb\BackendModule\EventListener;

use TYPO3\CMS\Backend\Routing\UriBuilder;
use TYPO3\CMS\Backend\Template\Components\ButtonBar;
use TYPO3\CMS\Backend\Template\Components\ModifyButtonBarEvent;
use TYPO3\CMS\Core\Imaging\Icon;
use TYPO3\CMS\Core\Imaging\IconFactory;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ModifyButtonBarEventListener
{
    protected IconFactory $iconFactory;

    public function __construct()
    {
        $this->iconFactory = GeneralUtility::makeInstance(IconFactory::class);
    }

    public function __invoke(ModifyButtonBarEvent $event): void
    {
        $request = $GLOBALS['TYPO3_REQUEST'];
        $buttons = $event->getButtons();

        if ($request->getUri()->getPath() === '/typo3/module/web/list' && array_key_exists('id', $request->getQueryParams())) {
            $buttonText = 'Switch to Page module';
            $iconFactory = GeneralUtility::makeInstance(IconFactory::class);
            $buttonIcon = $iconFactory->getIcon('actions-note', Icon::SIZE_SMALL);
            $uriBuilder = GeneralUtility::makeInstance(UriBuilder::class);
            $uri = (string)$uriBuilder->buildUriFromRoute('web_layout', ['id' => $request->getQueryParams()['id']]);
            $buttons[ButtonBar::BUTTON_POSITION_LEFT][5][] = $event->getButtonBar()
                ->makeLinkButton()
                ->setClasses('btn btn-default t3js-custom-list-module-btn')
                ->setTitle($buttonText)
                ->setShowLabelText(true)
                ->setHref($uri)
                ->setIcon($buttonIcon);

            $event->setButtons($buttons);
        }
    }
}
