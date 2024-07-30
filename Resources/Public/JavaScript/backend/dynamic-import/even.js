import Notification from "@typo3/backend/notification.js";

class Even {
    showEvenMessage(timestamp) {
        Notification.info(`Current timestamp ${timestamp} is even!`, `Current timestamp ${timestamp} is even!`, 5);
    }
}

export default new Even();

