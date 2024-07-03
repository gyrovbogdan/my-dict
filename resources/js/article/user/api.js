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
}

export default Api;
