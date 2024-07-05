import Dictionary from "../utils/dictionary.js";
import Api from "../utils/api.js";
import { deleteArticleEventListeners } from "../utils/events.js";

const token = $("#api-token").data("token");
const articleId = $("#article-id").data("id");
const url = `/api/article/${articleId}/dictionary`;
const translateUrl = "/api/translate";

const csrfToken = $('meta[name="csrf-token"]').attr("content");
deleteArticleEventListeners(articleId, csrfToken);

const api = new Api(token, url, translateUrl);
const dictionary = new Dictionary(api, "article.dictionary");

$(dictionary.init);
