import { fetchData } from "./api";
import { table } from "./display/table";
import { pagination } from "./display/pagination";
import { translationEvents } from "./events/translation";
import { deleteArticleEvents } from "./events/deleteArticle";
import { updateEvents } from "./events/update";
import { deleteEvents } from "./events/delete";
import { storeEvents } from "./events/store";

async function displayData(url, token, articleId) {
    console.log(url);
    let data = await fetchData(url, token);

    pagination(data, token, displayData);
    table(data);

    deleteEvents(token, displayData, url, articleId);
    updateEvents(token, articleId);
    storeEvents(token, displayData, articleId);
    translationEvents();
}

async function init() {
    const articleId = $("#article-id").data("id");
    const url = `/api/article/${articleId}/dictionary`;
    const token = $("#api-token").data("apiToken");

    const csrfToken = $('meta[name="csrf-token"]').attr("content");
    deleteArticleEvents(articleId, csrfToken);

    await displayData(url, token, articleId);
}

$(init);
