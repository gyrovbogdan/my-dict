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
