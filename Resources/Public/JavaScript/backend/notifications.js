import Notification from "@typo3/backend/notification.js";

class Notifications {
    constructor() {
        this.initialize();
    }
    initialize() {

        let successBtn = document.querySelector('#showSuccessNotification');
        successBtn.addEventListener('click', () => {
            Notification.success('This is a success message', 'This is a success message', 5);
        });
        let infoBtn = document.querySelector('#showInfoNotification');
        infoBtn.addEventListener('click', () => {
            Notification.info('This is an info message', 'This is an info message', 5);
        });
        let warningBtn = document.querySelector('#showWarningNotification');
        warningBtn.addEventListener('click', () => {
            Notification.warning('This is a warning message', 'This is a warning message', 5);
        });
        let errorBtn = document.querySelector('#showErrorNotification');
        errorBtn.addEventListener('click', () => {
            Notification.error('This is a warning message', 'This is a warning message', 5);
        });
    }
}

export default new Notifications();

