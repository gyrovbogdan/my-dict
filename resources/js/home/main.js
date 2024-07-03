import { fetchData } from "./api";
import { table } from "./display/table";
import { pagination } from "./display/pagination";
import { translationEvents } from "./events/translation";
import { updateEvents } from "./events/update";
import { storeEvents } from "./events/store";
import { deleteEvents } from "./events/delete";

async function displayData(url, token) {
    let data = await fetchData(url, token);

    if (data["data"].length == 0) {
        data = await fetchData("api/dictionary", token);
    }

    pagination(data, token, displayData);
    table(data);

    deleteEvents(token, displayData, url);
    storeEvents(token, displayData);
    updateEvents(token);
    translationEvents();
}

async function init() {
    const url = "api/dictionary";
    const token = $("#api-token").data("apiToken");
    await displayData(url, token);
}

$(init);
