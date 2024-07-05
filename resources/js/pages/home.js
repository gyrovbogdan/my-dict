import Dictionary from "../utils/dictionary.js";
import Api from "../utils/api.js";

const token = $("#api-token").data("token");
const url = `/api/dictionary`;
const translateUrl = "/api/translate";

const api = new Api(token, url, translateUrl);
const dictionary = new Dictionary(api, "dictionary");

$(dictionary.init);
