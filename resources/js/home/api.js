export function fetchData(url, token) {
    return $.ajax({
        url: url,
        method: "get",
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + token,
        },
    });
}

export function fetchTranslation(source, target, text) {
    return $.ajax({
        url: "api/translate",
        method: "get",
        data: { source, target, text },
    });
}

export function updateData(id, text, lang, token) {
    return $.ajax({
        url: `api/dictionary/${id}?${$.param({ text, lang })}`,
        method: "patch",
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + token,
        },
    });
}

export function storeData(text, lang, token) {
    return $.ajax({
        url: `api/dictionary?${$.param({ text, lang })}`,
        method: "post",
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + token,
        },
    });
}

export function deleteData(id, token) {
    return $.ajax({
        url: `api/dictionary/${id}`,
        method: "delete",
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + token,
        },
    });
}
