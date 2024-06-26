import { deleteData } from "./api";

export function deleteEvents(token, displayFunc, url) {
    $(".delete-button").on("click", function (e) {
        e.preventDefault();
        const id = $(this).closest("tr").find("input[name=id]").val();
        deleteData(id, token);
        displayFunc(url, token);
    });
}
