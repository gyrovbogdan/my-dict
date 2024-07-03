import { deleteData } from "../api";

export function deleteEvents(token, displayFunc, url, articleId) {
    $(".delete-button").on("click", function () {
        const id = $(this).closest("tr").find("input[name=id]").val();
        deleteData(articleId, id, token);
        displayFunc(url, token, articleId);
    });
}
