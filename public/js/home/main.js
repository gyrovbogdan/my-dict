import { fetchData } from "./api";
import { table } from "./table";
import { pagination } from "./pagination";
import { translationEvents } from "./translation";
import { updateEvents } from "./update";
import { storeEvents } from "./store";
import { deleteEvents } from "./delete";

async function displayData(url, token) {
    let data = await fetchData(url, token);

    if (data["data"].length == 0) {
        data = await fetchData("api/dictionary", token);
    }

    table(data);
    pagination(data, token, displayData);

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
