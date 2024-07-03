import { storeData } from "../api";

export function storeEvents(token, displayFunc, articleId) {
    $(".new-text").on("keydown", function (e) {
        if (e.key == "Enter") {
            const $this = $(this);
            const text = $this.val();
            const lang = $this.data("lang");
            if (text == "" || lang == "") return;
            $this.trigger("blur");
            $(".new-text").val("");
            storeData(text, lang, token, articleId).then(
                displayFunc(
                    `/api/article/${articleId}/dictionary`,
                    token,
                    articleId
                )
            );
        }
    });
}
