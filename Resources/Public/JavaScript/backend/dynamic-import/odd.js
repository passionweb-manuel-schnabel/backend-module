import Notification from "@typo3/backend/notification.js";

class Odd {
    showOddMessage(timestamp) {
        Notification.info(`Current timestamp ${timestamp} is odd!`, `Current timestamp ${timestamp} is odd!`, 5);
    }
}

export default new Odd();

