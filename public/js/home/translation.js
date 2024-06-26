import { fetchTranslation } from "./api";

export function translationEvents() {
    let debounceTimer;
    $(".ru-text, .en-text").on("input", async function () {
        clearTimeout(debounceTimer);

        const element = this;
        debounceTimer = setTimeout(function () {
            const text = $(element).val();
            if (text.length < 1 || text.length > 20) {
                return;
            }
            const lang = $(element).data("lang");
            const translateLang = lang === "ru" ? "en" : "ru";
            fetchTranslation(lang, translateLang, text).then((data) =>
                $(element)
                    .closest("tr")
                    .find(`.${translateLang}-text`)
                    .val(data)
            );
        }, 500);
    });
}
