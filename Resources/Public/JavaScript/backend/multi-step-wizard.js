import Severity from "@typo3/backend/severity.js";
import MultiStepWizard from "@typo3/backend/multi-step-wizard.js";

class ExampleMultiStepWizard {
    constructor() {
        this.initialize();
    }
    initialize() {
        let multiStepWizardBtn = document.querySelector('#openMultiStepWizard');
        multiStepWizardBtn.addEventListener('click', (event) => {
            event.preventDefault();
            this.addMultiStepWizard();
        });
    }
    addMultiStepWizard() {
        MultiStepWizard.addSlide('step-1', 'Start', '', Severity.notice, 'Start', function (slide, settings) {
            // set custom parameter for later use
            settings['customParameter'] = 'Custom value added on slide 1';
            slide.html('<h1>Headline on slide 1</h1><p>Custom content on slide 1</p>');
            // simulate async loading or any other action from the user
            setTimeout(() => {
                MultiStepWizard.lockPrevStep();
                MultiStepWizard.unlockNextStep();
            }, 100);
        });
        MultiStepWizard.addSlide('step-2', 'Between', '', Severity.notice, 'Between', function (slide, settings) {
            slide.html('<h1>Headline on slide 2</h1><p>Custom content on slide 2</p><p>' + settings['customParameter'] + '</p>');
            // simulate async loading or any other action from the user
            setTimeout(() => {
                MultiStepWizard.unlockPrevStep();
                MultiStepWizard.unlockNextStep();
            }, 100);
        });
        MultiStepWizard.addSlide('step-3', 'Finish', '', Severity.notice, 'Finish', function (slide, settings) {
            slide.html('<h1>Headline on slide 3</h1><p>Custom content on slide 3</p><p>' + settings['customParameter'] + '</p>');
            // simulate async loading or any other action from the user
            setTimeout(() => {
                MultiStepWizard.unlockPrevStep();
                MultiStepWizard.unlockNextStep();
            }, 100);
        });
        MultiStepWizard.addFinalProcessingSlide(() => {
            MultiStepWizard.dismiss();
        });
        MultiStepWizard.show();
    }
}

export default new ExampleMultiStepWizard();
