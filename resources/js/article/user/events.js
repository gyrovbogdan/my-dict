export function paginationEventListeners(dictionary) {
    $(".page-item:not(.disabled) .page-link").on("click", function () {
        $(".page-item").removeClass("active");
        $(this).addClass("active");

        dictionary.url = $(this).data("href");
        dictionary.init();
    });
}

export function translationEventListeners(dictionary) {
    let debounceTimer;
    $(".ru-text, .en-text").on("input", async function () {
        clearTimeout(debounceTimer);

        const $element = $(this);
        debounceTimer = setTimeout(async function () {
            const text = $element.val();

            if (text.length < 1 || text.length > 20) {
                return;
            }

            const source = $element.data("lang");
            const target = source === "ru" ? "en" : "ru";
            const translation = await dictionary.api.translate(
                source,
                target,
                text
            );
            $element.closest("tr").find(`.${target}-text`).val(translation);
        }, 300);
    });
}
