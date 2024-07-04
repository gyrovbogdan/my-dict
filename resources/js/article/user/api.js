export class Api {
    constructor(token, url, translateUrl) {
        this.token = token;
        this.url = url;
        this.translateUrl = translateUrl;
    }

    get(url) {
        return $.ajax({
            url: url,
            method: "GET",
        });
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

    store(text, lang, url = this.url) {
        return $.ajax(
            this.withToken({
                url: url,
                method: "POST",
                data: { text, lang },
            })
        );
    }
}

export default Api;
