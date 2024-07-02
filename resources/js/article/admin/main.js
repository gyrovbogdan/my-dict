import { fetchData } from "./api";
import { table } from "./table";
import { pagination } from "./pagination";
import { translationEvents } from "./translation";
import { deleteArticleEvents } from "./deleteArticle";
// import {add to your dictionary events}

async function displayData(url, token) {
    let data = await fetchData(url, token);
    pagination(data, token, displayData);
    table(data);
    translationEvents();
    // add to your dictionary events ()
}

async function init() {
    const articleId = $("#article-id").data("id");
    const url = `/api/article/${articleId}/dictionary`;
    const token = $("#api-token").data("apiToken");
    const csrfToken = $('meta[name="csrf-token"]').attr("content");
    deleteArticleEvents(articleId, csrfToken);
    await displayData(url, token);
}

$(init);
