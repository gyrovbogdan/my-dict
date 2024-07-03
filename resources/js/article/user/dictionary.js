import { renderTable, renderPagination } from "./render";
import { paginationEventListeners, translationEventListeners } from "./events";

class Dictionary {
    constructor(api) {
        this.api = api;
        this.url = api.url;
        this.init = this.init.bind(this);
        this.display = this.display.bind(this);
        this.addEventListeners = this.addEventListeners.bind(this);
    }

    async init() {
        await this.display();
        this.addEventListeners();
    }

    async display() {
        let data = await this.api.get(this.url);
        if (data.data.length == 0) data = await this.api.get(this.api.url);
        renderTable(data);
        renderPagination(data);
    }

    addEventListeners() {
        paginationEventListeners(this);
        translationEventListeners(this);
    }
}

export default Dictionary;
