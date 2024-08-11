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
                dictionary.api
                    .update(id, text, lang)
                    .fail(() =>
                        dictionary.toast.error(
                            "Возникла ошибка...",
                            "Возникла ошибка при обновлении данных. Обновите страницу и попробуйте еще раз..."
                        )
                    );

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

    $(".btn-delete").on("click", function () {
        const $this = $(this);
        $this.off();
        const id = $this.closest("tr").find("input[name=id]").val();
        dictionary.api
            .delete(id)
            .fail(() =>
                dictionary.toast.error(
                    "Возникла ошибка...",
                    "Возникла ошибка при удалении данных. Обновите страницу и попробуйте еще раз..."
                )
            );
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

            dictionary.api
                .store(text, lang)
                .done(() => {
                    dictionary.init();
                })
                .fail(() =>
                    dictionary.toast.error(
                        "Возникла ошибка...",
                        "Возникла ошибка при сохранении данных. Попробуйте еще раз..."
                    )
                );

            $this.trigger("blur");
            $(".new-text").val("");
        }
    });

    $("#btn-add").on("click", function () {
        const $tr = $(this).closest("tr");
        const $word = $tr.find("input[name=word]");
        const text = $word.val();
        const lang = $word.data("lang");
        if (text == "" || lang == "") return;

        dictionary.api
            .store(text, lang)
            .done(() => {
                dictionary.init();
            })
            .fail(() =>
                dictionary.toast.error(
                    "Возникла ошибка...",
                    "Возникла ошибка при сохранении данных. Попробуйте еще раз..."
                )
            );

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
            const translation = await dictionary.api
                .translate(source, target, text)
                .fail(() =>
                    dictionary.toast.error(
                        "Возникла ошибка...",
                        "Возникла ошибка при переводе. Обновите страницу и попробуйте еще раз..."
                    )
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

    $(".bnt-add").on("click", function () {
        const $tr = $(this).closest("tr");
        const text = $tr.find("input[name=word]").val();
        const lang = "ru";
        dictionary.api
            .store(text, lang, "/api/dictionary")
            .done(() => {
                dictionary.toast.success(
                    "Слово успешно сохранено...",
                    "В ваш словарь добавлено новое слово. Продолжайте в том же духе!"
                );
            })
            .fail(() =>
                dictionary.toast.error(
                    "Возникла ошибка...",
                    "Возникла ошибка при сохранении данных. Попробуйте еще раз..."
                )
            );
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
