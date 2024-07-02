import { data } from "jquery";

export function fetchData(url, token) {
    return $.ajax({
        url: url,
        method: "GET",
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + token,
        },
    });
}

export function fetchTranslation(source, target, text) {
    return $.ajax({
        url: "/api/translate",
        method: "GET",
        data: { source, target, text },
    });
}

export function deleteArticle(id, csrfToken, success) {
    return $.ajax({
        url: `/article/${id}`,
        method: "POST",
        data: {
            _token: csrfToken,
            _method: "DELETE",
        },
        success: success,
    });
}
