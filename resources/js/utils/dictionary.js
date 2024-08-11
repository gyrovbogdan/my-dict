import { renderTable, renderPagination } from "./render";
import { Toaster } from "./toast";
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
        this.toast = new Toaster();
    }

    async init() {
        try {
            this.user = await this.api
                .getUser()
                .done((data) => data)
                .fail(() => null);
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
        translationEventListeners(this);

        function manageEventListeners(dictionary) {
            updateEventListeners(dictionary);
            deleteEventListeners(dictionary);
            storeEventListeners(dictionary);
        }

        if (this.user) {
            if (this.mode == "articles.dictionary") {
                addToUserDictionaryEventListeners(this);
                if (this.user.is_admin) {
                    manageEventListeners(this);
                }
            } else if (this.mode == "dictionary") {
                manageEventListeners(this);
            }
        }
    }
}

export default Dictionary;
