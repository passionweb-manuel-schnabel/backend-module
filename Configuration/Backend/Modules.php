<?php

return [
    'web_examplebackendmodule' => [
        'parent' => 'web',
        'position' => ['after' => 'web_info'],
        'access' => 'user',
        'workspaces' => 'live',
        'path' => '/module/page/example-backend-module',
        'icon'   => 'EXT:backend_module/Resources/Public/Icons/Extension.png',
        'labels' => 'LLL:EXT:backend_module/Resources/Private/Language/locallang_mod.xlf',
        'extensionName' => 'BackendModule',
        'controllerActions' => [
            \Passionweb\BackendModule\Controller\BackendController::class => 'dashboard, multiStepWizard, ajaxRequest',
        ],
    ]
];
