import Notification from "@typo3/backend/notification.js";

class Notifications {
    constructor() {
        this.initialize();
    }
    initialize() {

        let successBtn = document.querySelector('#showSuccessNotification');
        successBtn.addEventListener('click', () => {
            Notification.success(TYPO3.lang['notification.successMessage'], TYPO3.lang['notification.successMessage'], 5);
        });
        let infoBtn = document.querySelector('#showInfoNotification');
        infoBtn.addEventListener('click', () => {
            Notification.info(TYPO3.lang['notification.infoMessage'], TYPO3.lang['notification.infoMessage'], 5);
        });
        let warningBtn = document.querySelector('#showWarningNotification');
        warningBtn.addEventListener('click', () => {
            Notification.warning(TYPO3.lang['notification.warningMessage'], TYPO3.lang['notification.warningMessage'], 5);
        });
        let errorBtn = document.querySelector('#showErrorNotification');
        errorBtn.addEventListener('click', () => {
            Notification.error(TYPO3.lang['notification.errorMessage'], TYPO3.lang['notification.errorMessage'], 5);
        });
    }
}

export default new Notifications();

