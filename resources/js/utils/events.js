export function paginationEventListeners(dictionary) {
    $(".page-item:not(.disabled, .active) .page-link").on("click", function () {
        const $this = $(this);

        $this.off();
        $(".page-item").removeClass("active");
        $this.addClass("active");

        dictionary.url = $this.data("href");
        dictionary.init();
    });
}

export function updateEventListeners(dictionary) {
    if (!dictionary.user) {
        return;
    }

    $(".table-text").on("focus", function () {
        const $this = $(this);
        const $row = $this.closest("tr");
        const buffer = $row.html();
        let dataChanged = false;

        $this.on("keydown", function (e) {
            if (e.key == "Enter") {
                const id = $row.find("input[name=id]").val();
                const text = $this.val();
                const lang = $this.data("lang");
                dictionary.api.update(id, text, lang);

                dataChanged = true;
                $this.trigger("blur");
            }
        });

        $this.on("blur", function () {
            if (dataChanged) return;
            $this.closest("tr").html(buffer);
        });
    });
}

export function deleteEventListeners(dictionary) {
    if (!dictionary.user) {
        return;
    }

    $(".delete-button").on("click", function () {
        const $this = $(this);
        $this.off();
        const id = $this.closest("tr").find("input[name=id]").val();
        dictionary.api.delete(id);
        dictionary.init();
    });
}

export function storeEventListeners(dictionary) {
    if (!dictionary.user) {
        return;
    }

    $(".new-text").on("keydown", function (e) {
        if (e.key == "Enter") {
            const $this = $(this);
            const text = $this.val();
            const lang = $this.data("lang");
            if (text == "" || lang == "") return;

            dictionary.api.store(text, lang);
            dictionary.init();

            $this.trigger("blur");
            $(".new-text").val("");
        }
    });

    $("#button-add").on("click", function () {
        const $tr = $(this).closest("tr");
        const $word = $tr.find("input[name=word]");
        const text = $word.val();
        const lang = $word.data("lang");
        if (text == "" || lang == "") return;

        dictionary.api.store(text, lang);
        dictionary.init();

        $(".new-text").val("");
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
            $element.closest("tr").find(`.${target}-text`).val("Loading...");
            const translation = await dictionary.api.translate(
                source,
                target,
                text
            );

            if ($element.val()) {
                $element.closest("tr").find(`.${target}-text`).val(translation);
            }
        }, 700);
    });
}

export function addToUserDictionaryEventListeners(dictionary) {
    if (!dictionary.user) {
        return;
    }

    $(".add-button").on("click", function () {
        const $tr = $(this).closest("tr");
        const text = $tr.find("input[name=word]").val();
        const lang = "ru";
        dictionary.api.store(text, lang, "/api/dictionary");
    });
}

export function deleteArticleEventListeners(articleId, csrfToken) {
    $("#delete-article").on("click", () => {
        $.ajax({
            method: "POST",
            url: `/articles/${articleId}`,
            data: {
                _token: csrfToken,
                _method: "DELETE",
            },
            success: function () {
                window.location.replace("/articles");
            },
        });
    });
}
