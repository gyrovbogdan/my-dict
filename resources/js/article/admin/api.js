export function fetchData(url) {
    return $.ajax({
        url: url,
        method: "GET",
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

export function storeData(text, lang, token, articleId) {
    return $.ajax({
        url: `/api/article/${articleId}/dictionary?${$.param({ text, lang })}`,
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + token,
        },
    });
}

export function deleteData(articleId, dictionaryId, token) {
    return $.ajax({
        url: `/api/article/${articleId}/dictionary/${dictionaryId}`,
        method: "DELETE",
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + token,
        },
    });
}

export function updateData(token, articleId, dictionaryId, text, lang) {
    return $.ajax({
        url: `/api/article/${articleId}/dictionary/${dictionaryId}?${$.param({
            text,
            lang,
        })}`,
        method: "PATCH",
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + token,
        },
    });
}
