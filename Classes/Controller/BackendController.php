<?php

namespace Passionweb\BackendModule\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Backend\Module\ModuleData;
use TYPO3\CMS\Backend\Routing\Exception\RouteNotFoundException;
use TYPO3\CMS\Backend\Routing\UriBuilder;
use TYPO3\CMS\Backend\Template\Components\Buttons\LinkButton;
use TYPO3\CMS\Backend\Template\ModuleTemplate;
use TYPO3\CMS\Backend\Template\ModuleTemplateFactory;
use TYPO3\CMS\Core\Imaging\Icon;
use TYPO3\CMS\Core\Imaging\IconFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class BackendController extends ActionController
{
    protected ?ModuleData $moduleData;
    protected ModuleTemplate $moduleTemplate;

    public function __construct(
        protected ModuleTemplateFactory $moduleTemplateFactory,
        protected UriBuilder $backendUriBuilder,
        protected IconFactory $iconFactory
    )
    {
    }

    /**
     * @throws RouteNotFoundException
     */
    public function initializeAction(): void
    {
        $this->moduleData = $this->request->getAttribute('moduleData');
        $this->moduleTemplate = $this->moduleTemplateFactory->create($this->request);
        $this->moduleTemplate->setTitle('Example Backend Module');
        $this->moduleTemplate->setFlashMessageQueue($this->getFlashMessageQueue());
        $this->moduleTemplate->setModuleId('exampleBackendModule');

        $this->generateButtonBar();
    }

    public function dashboardAction(): ResponseInterface
    {
        return $this->htmlResponse($this->moduleTemplate->render());
    }

    public function buttonOneAction(): ResponseInterface
    {
        return $this->htmlResponse($this->moduleTemplate->render());
    }

    public function buttonTwoAction(): ResponseInterface
    {
        return $this->htmlResponse($this->moduleTemplate->render());
    }

    public function buttonThreeAction(): ResponseInterface
    {
        return $this->htmlResponse($this->moduleTemplate->render());
    }

    /**
     * @throws RouteNotFoundException
     */
    protected function generateButtonBar(): void
    {
        $moduleName = 'web_examplebackendmodule';
        $rootPageId = $this->request->getAttribute('site')->getRootPageId();
        $uriParameters = [
            'id' => $this->request->getQueryParams()['id'] ?? $rootPageId,
            'action' => 'dashboard',
            'controller' => 'Backend'
        ];

        $buttonBar = $this->moduleTemplate->getDocHeaderComponent()->getButtonBar();

        // dashboard button
        $url = (string)$this->backendUriBuilder->buildUriFromRoute($moduleName, $uriParameters);
        $button = $this->buildButton('actions-menu', 'Dashboard', 'btn-md btn-primary rounded', $url);
        $buttonBar->addButton($button);

        // button one
        $uriParameters['action'] = 'buttonOne';
        $url = (string)$this->backendUriBuilder->buildUriFromRoute($moduleName, $uriParameters);
        $button = $this->buildButton('actions-file-text', 'Button One', 'btn-md btn-secondary mx-2 rounded', $url);
        $buttonBar->addButton($button);

        // button two
        $uriParameters['action'] = 'buttonTwo';
        $url = (string)$this->backendUriBuilder->buildUriFromRoute($moduleName, $uriParameters);
        $button = $this->buildButton('actions-file-text', 'Button Two', 'btn-md btn-secondary rounded', $url);
        $buttonBar->addButton($button);

        // button three
        $uriParameters['action'] = 'buttonThree';
        $url = (string)$this->backendUriBuilder->buildUriFromRoute($moduleName, $uriParameters);
        $button = $this->buildButton('actions-file-text', 'Button Three', 'btn-md btn-secondary mx-2 rounded', $url);
        $buttonBar->addButton($button);
    }

    protected function buildButton(string $iconIdentifier, string $title, string $classes, string $url): LinkButton
    {
        $button = GeneralUtility::makeInstance(LinkButton::class);
        return $button
            ->setIcon($this->iconFactory->getIcon($iconIdentifier, Icon::SIZE_SMALL))
            ->setTitle($title)
            ->setShowLabelText(true)
            ->setClasses($classes)
            ->setHref($url);
    }
}
