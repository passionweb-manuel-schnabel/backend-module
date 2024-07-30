<?php

namespace Passionweb\BackendModule\EventListener;

use TYPO3\CMS\Backend\Controller\Event\ModifyNewContentElementWizardItemsEvent;

final class ModifyNewContentElementWizardItemsEventListener
{
    public function __invoke(ModifyNewContentElementWizardItemsEvent $event): void
    {
        // add your custom logic here
        foreach($event->getWizardItems() as $key => $wizardItem) {
            if(!str_contains($key, '_')) {
                continue;
            }
            $event->setWizardItem(
                $key,
                [
                    'iconIdentifier' => $wizardItem['iconIdentifier'],
                    'title' => $wizardItem['title'] . ' (Modified by event)',
                    'description' => $wizardItem['description'],
                    'tt_content_defValues' => $wizardItem['tt_content_defValues'],
                ]
            );
        }
    }
}
