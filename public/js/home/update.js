import { updateData } from "./api";

export function updateEvents(token) {
    $(".table-text").on("keydown", function (e) {
        if (e.key == "Enter") {
            const id = $(this).parent().parent().find("input[name=id]").val();
            updateData(id, $(this).val(), $(this).data("lang"), token);
            $(this).trigger("blur");
        }
    });

    $(".submit-button").on("click", function () {
        const id = $(this).closest("tr").find("input[name=id]").val();
        const $text = $(this).closest("tr").find("input[name=word]");
        updateData(id, $text.val(), $text.data("lang"), token);
    });
}
