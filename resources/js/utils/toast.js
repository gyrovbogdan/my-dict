import { Toast } from "bootstrap";

export class Toaster {
    constructor() {
        this.counter = 0;
    }

    info(title, message) {
        const toastHtml = this.getString("text-bg-info", title, message);
        this.create(toastHtml);
        this.counter++;
    }

    success(title, message) {
        const toastHtml = this.getString("text-bg-success", title, message);
        this.create(toastHtml);
        this.counter++;
    }

    error(title, message) {
        const toastHtml = this.getString("text-bg-danger", title, message);
        this.create(toastHtml);
        this.counter++;
    }

    getString(colorSchema, title, message) {
        return `
        <div id="toast-${this.counter}" class="toast ${colorSchema}" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header ${colorSchema}">
                <strong class="me-auto">${title}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                ${message}
            </div>
        </div>`;
    }

    create(toastHtml) {
        $("#toast-container").append(toastHtml);
        const $toastLiveExample = $(`#toast-${this.counter}`);
        const toastBootstrap = Toast.getOrCreateInstance($toastLiveExample);
        toastBootstrap.show();
    }
}

export default Toaster;
