<?php

declare(strict_types=1);

namespace Passionweb\BackendModule\Backend\ToolbarItems;

use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Backend\Toolbar\RequestAwareToolbarItemInterface;
use TYPO3\CMS\Backend\Toolbar\ToolbarItemInterface;
use TYPO3\CMS\Backend\View\BackendViewFactory;

class CustomToolbarItem implements ToolbarItemInterface, RequestAwareToolbarItemInterface
{
    private ServerRequestInterface $request;

    protected BackendViewFactory $backendViewFactory;

    public function __construct(
        BackendViewFactory $backendViewFactory
    ) {
        $this->backendViewFactory = $backendViewFactory;
    }

    public function setRequest(ServerRequestInterface $request): void
    {
        $this->request = $request;
    }

    public function checkAccess(): bool
    {
        return true;
    }

    public function getItem(): string
    {
        $view = $this->backendViewFactory->create($this->request, ['backend_module']);
        // add your custom logic here
        $view->assign('customToolbarItemInfo', 'Custom toolbar item');
        return $view->render('ToolbarItems/CustomToolbarItem');
    }

    public function getAdditionalAttributes(): array
    {
        return ['class' => 't3js-toolbar-item-backend-module-custom'];
    }

    public function hasDropDown(): bool
    {
        return false;
    }

    public function getDropDown(): string
    {
        return '';
    }

    /**
     * Position relative to others, requests should be very left.
     */
    public function getIndex(): int
    {
        return 15;
    }
}
