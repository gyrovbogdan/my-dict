import { fetchData } from "./api";
import { table } from "./display/table";
import { pagination } from "./display/pagination";
// import {add to your dictionary events}

async function displayData(url, token) {
    let data = await fetchData(url, token);
    pagination(data, token, displayData);
    table(data);
    // add to your dictionary events ()
}

async function init() {
    const articleId = $("#article-id").data("id");
    const url = `/api/article/${articleId}/dictionary`;
    const token = $("#api-token").data("apiToken");
    await displayData(url, token);
}

$(init);
