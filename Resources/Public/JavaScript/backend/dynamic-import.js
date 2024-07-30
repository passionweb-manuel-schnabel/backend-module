class DynamicImport {
    constructor() {
        this.initialize();
    }
    initialize() {
        let timestampBtn = document.querySelector('#timestampBtn');
        timestampBtn.addEventListener('click', async () => {
            // check if current timestamp is even or odd
            const time = Date.now();
            if (time % 2 === 0) {
                const Even = (await import('./dynamic-import/even.js')).default
                Even.showEvenMessage(time);
            } else {
                const Odd = (await import('./dynamic-import/odd.js')).default
                Odd.showOddMessage(time);
            }
        });
    }
}

export default new DynamicImport();

