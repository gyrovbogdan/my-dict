import Dictionary from "./dictionary.js";
import Api from "./api.js";
import { deleteArticleEventListeners } from "./deleteArticleEventListeners.js";

const token = $("#api-token").data("token");
const articleId = $("#article-id").data("id");
const url = `/api/article/${articleId}/dictionary`;
const translateUrl = "/api/translate";

const csrfToken = $('meta[name="csrf-token"]').attr("content");
deleteArticleEventListeners(articleId, csrfToken);

const api = new Api(token, url, translateUrl);
const dictionary = new Dictionary(api);

$(dictionary.init);
