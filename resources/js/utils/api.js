import { Toaster } from "./toast";

export class Api {
    constructor(token, url, translateUrl) {
        this.token = token;
        this.url = url;
        this.translateUrl = translateUrl;
        this.toast = new Toaster();
    }

    get(url) {
        return $.ajax(
            this.withToken({
                url: url,
                method: "GET",
            })
        ).fail(() =>
            this.toast.error(
                "Возникла ошибка...",
                "Возникла ошибка при загрузке данных. Обновите страницу и попробуйте еще раз..."
            )
        );
    }

    update(id, text, lang) {
        return $.ajax(
            this.withToken({
                url: `${this.url}/${id}`,
                method: "PATCH",
                data: { text, lang },
            })
        )
            .done(() =>
                this.toast.success(
                    "Данные успешно обновлены!",
                    "Ваше слово сохранено, продолжайте в том же духе"
                )
            )
            .fail(() =>
                this.toast.error(
                    "Возникла ошибка...",
                    "Возникла ошибка при обновлении данных. Обновите страницу и попробуйте еще раз..."
                )
            );
    }

    delete(id) {
        return $.ajax(
            this.withToken({
                url: `${this.url}/${id}`,
                method: "DELETE",
            })
        )
            .done(() =>
                this.toast.success(
                    "Данные успешно удалены!",
                    "Ваше слово удалено, можете добавить новое!"
                )
            )
            .fail(() =>
                this.toast.error(
                    "Возникла ошибка...",
                    "Возникла ошибка при удалении данных. Обновите страницу и попробуйте еще раз..."
                )
            );
    }

    store(text, lang, url = this.url) {
        return $.ajax(
            this.withToken({
                url: url,
                method: "POST",
                data: { text, lang },
            })
        )
            .done(() =>
                this.toast.success(
                    "Данные успешно обновлены!",
                    "Ваше слово сохранено, продолжайте в том же духе"
                )
            )
            .fail(() =>
                this.toast.error(
                    "Возникла ошибка...",
                    "Возникла ошибка при сохранении данных. Попробуйте еще раз..."
                )
            );
    }

    translate(source, target, text) {
        return $.ajax({
            url: this.translateUrl,
            method: "GET",
            data: { source, target, text },
        }).fail(() =>
            this.toast.error(
                "Возникла ошибка...",
                "Возникла ошибка при переводе. Обновите страницу и попробуйте еще раз..."
            )
        );
    }

    withToken(options) {
        options["headers"] = {
            Authorization: "Bearer " + this.token,
        };
        return options;
    }

    getUser() {
        return $.ajax(
            this.withToken({
                url: "/api/user",
                method: "GET",
            })
        )
            .done((data) => data)
            .fail(() => null);
    }
}

export default Api;
