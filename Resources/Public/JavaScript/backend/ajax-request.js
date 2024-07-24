import AjaxRequest from "@typo3/core/ajax/ajax-request.js";
class SampleAjaxRequest {
    constructor() {
        this.initialize();
    }
    initialize() {
        let ajaxRequestBtn = document.querySelector('#sendAjaxRequest');
        ajaxRequestBtn.addEventListener('click', (event) => {
            event.preventDefault();
            this.sendAjaxRequest();
        });
    }
    sendAjaxRequest() {
        const postData = {
            'param': 'Sample',
        }
        new AjaxRequest(TYPO3.settings.ajaxUrls['sample_ajaxrequest'])
            .post(
                postData
            )
            .then(async function (response) {
                const resolved = await response.resolve();
                const responseBody = JSON.parse(resolved);
                if(responseBody.error) {
                    console.log(responseBody.error);
                } else {
                    document.querySelector('#ajaxResponse').innerHTML = responseBody.output;
                }
            })
            .catch((error) => {
                console.log(error);
            });
    }
}

export default new SampleAjaxRequest();
