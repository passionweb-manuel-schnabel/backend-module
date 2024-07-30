<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return function (ContainerConfigurator $configurator, ContainerBuilder $containerBuilder) {
    $services = $configurator->services();

    $services->defaults()
        ->private()
        ->autowire()
        ->autoconfigure();

    $services->load('Passionweb\\BackendModule\\', __DIR__ . '/../Classes/')->exclude([
        __DIR__ . '/../Classes/Domain/Model',
    ]);

    $services->set(\Passionweb\BackendModule\EventListener\ModifyButtonBarEventListener::class)
        ->tag('event.listener', [
            'method' => '__invoke',
            'event' => 'TYPO3\\CMS\\Backend\\Template\\Components\\ModifyButtonBarEvent',
        ]);

    $services->set(\Passionweb\BackendModule\EventListener\ModifyNewContentElementWizardItemsEventListener::class)
        ->tag('event.listener', [
            'method' => '__invoke',
            'event' => 'TYPO3\\CMS\\Backend\\Controller\\Event\\ModifyNewContentElementWizardItemsEvent',
        ]);
};
