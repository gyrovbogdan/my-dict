import { renderTable, renderPagination } from "./render";
import {
    paginationEventListeners,
    storeEventListeners,
    updateEventListeners,
    deleteEventListeners,
    translationEventListeners,
    addToUserDictionaryEventListeners,
} from "./events";

class Dictionary {
    constructor(api, mode = "dictionary") {
        this.api = api;
        this.url = api.url;
        this.mode = mode;
        this.init = this.init.bind(this);
        this.display = this.display.bind(this);
        this.addEventListeners = this.addEventListeners.bind(this);
        this.user = null;
    }

    async init() {
        try {
            this.user = await this.api.getUser();
        } catch (error) {}
        await this.display();
        this.addEventListeners();
    }

    async display() {
        let data = await this.api.get(this.url);
        if (data.data.length == 0) data = await this.api.get(this.api.url);

        renderTable(data, this.mode, this.user);
        renderPagination(data);
    }

    addEventListeners() {
        paginationEventListeners(this);
        updateEventListeners(this);
        deleteEventListeners(this);
        storeEventListeners(this);
        translationEventListeners(this);
        addToUserDictionaryEventListeners(this);
    }
}

export default Dictionary;
