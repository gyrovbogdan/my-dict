export class Api {
    constructor(token, url, translateUrl) {
        this.token = token;
        this.url = url;
        this.translateUrl = translateUrl;
    }

    get(url) {
        return $.ajax(
            this.withToken({
                url: url,
                method: "GET",
            })
        );
    }

    update(id, text, lang) {
        return $.ajax(
            this.withToken({
                url: `${this.url}/${id}`,
                method: "PATCH",
                data: { text, lang },
            })
        );
    }

    delete(id) {
        return $.ajax(
            this.withToken({
                url: `${this.url}/${id}`,
                method: "DELETE",
            })
        );
    }

    store(text, lang, url = this.url) {
        return $.ajax(
            this.withToken({
                url: url,
                method: "POST",
                data: { text, lang },
            })
        );
    }

    translate(source, target, text) {
        return $.ajax({
            url: this.translateUrl,
            method: "GET",
            data: { source, target, text },
        });
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
