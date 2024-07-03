import { deleteArticle } from "../api.js";

export function deleteArticleEvents(id, token) {
    $("#delete-article").on("click", async () => {
        deleteArticle(id, token, () => window.location.replace("/article"));
    });
}
