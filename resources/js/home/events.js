export function paginationEventListeners(dictionary) {
    $(".page-item:not(.disabled) .page-link").on("click", function () {
        $(".page-item").removeClass("active");
        $(this).addClass("active");

        dictionary.url = $(this).data("href");
        dictionary.init();
    });
}

export function updateEventListeners(dictionary) {
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
    $(".delete-button").on("click", function () {
        const id = $(this).closest("tr").find("input[name=id]").val();
        dictionary.api.delete(id);
        dictionary.init();
    });
}

export function storeEventListeners(dictionary) {
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