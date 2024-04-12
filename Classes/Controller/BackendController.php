<?php

namespace Passionweb\BackendModule\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Backend\Module\ModuleData;
use TYPO3\CMS\Backend\Template\ModuleTemplate;
use TYPO3\CMS\Backend\Template\ModuleTemplateFactory;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class BackendController extends ActionController
{
    protected ?ModuleData $moduleData;
    protected ModuleTemplate $moduleTemplate;

    public function __construct(
        protected ModuleTemplateFactory $moduleTemplateFactory
    )
    {
    }

    public function initializeAction(): void
    {
        $this->moduleData = $this->request->getAttribute('moduleData');
        $this->moduleTemplate = $this->moduleTemplateFactory->create($this->request);
        $this->moduleTemplate->setTitle('Example Backend Module');
        $this->moduleTemplate->setFlashMessageQueue($this->getFlashMessageQueue());
        $this->moduleTemplate->setModuleId('exampleBackendModule');
    }

    public function dashboardAction(): ResponseInterface
    {
        return $this->htmlResponse($this->moduleTemplate->render());
    }
}
