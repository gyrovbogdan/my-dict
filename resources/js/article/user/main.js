import { fetchData } from "./api";
import { table } from "./table";
import { pagination } from "./pagination";
// import {add to your dictionary events}

async function displayData(url, token) {
    let data = await fetchData(url, token);
    pagination(data, token, displayData);
    table(data);
    // add to your dictionary events ()
}

async function init() {
    const articleId = $("#article-id").data("id");
    const url = `/api/article/${articleId}`;
    const token = $("#api-token").data("apiToken");
    await displayData(url, token);
}

$(init);
