function fetchData(url, token) {
    return $.ajax({
        url: url,
        method: "get",
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + token,
        },
    });
}

function updatePagination(data, token) {
    const $pagination = $("#pagination");
    $pagination.empty();

    for (const link of data["links"]) {
        const { url, label, active } = link;
        const activeLink = active ? "active" : "";
        const disabledLink = url === null ? "disabled" : "";
        const linkItem = `<li class="page-item unselectable ${activeLink} ${disabledLink}"><a class="page-link" data-href="${url}" >${label}</a></li>`;
        $pagination.append(linkItem);
    }

    $(".page-item:not(.disabled) .page-link").on("click", function () {
        const url = $(this).data("href");
        displayData(url, token);
    });
}

function fillTable(data) {
    const $table = $("#dictionary-body");
    $table.empty();

    for (const row of data["data"]) {
        const { id, word, translation } = row;
        const tableRow = `<tr>
            <th scope="row"><input name="id" value=${id} disabled class="text"></th>
            <td><input name="word" value=${word} class="text"></td>
            <td><input name="translation" value=${translation} class="text"></td>
        </tr>`;
        $table.append(tableRow);
    }
}

async function displayData(url, token) {
    const data = await fetchData(url, token);
    fillTable(data);
    updatePagination(data, token);
}

function init() {
    const url = "api/dictionary";
    const token = $("#api-token").data("apiToken");
    displayData(url, token);
}

$(init);
