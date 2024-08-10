export function renderTable(data, mode, user = null) {
    const $table = $("#table");
    $table.hide();
    $table.empty();

    const createCloseButton = () =>
        '<td><button class="btn btn-light btn-delete btn-dict"><i class="bi bi-x-lg"></i></button></td>';
    const createAddButton = () =>
        '<td><button class="btn btn-light bnt-add btn-dict"><i class="bi bi-plus-lg"></i></button></td>';

    let cells = "";
    switch (mode) {
        case "dictionary":
            if (user) cells = createCloseButton();
            break;
        case "articles.dictionary":
            if (user) {
                if (user["is_admin"]) {
                    cells = createAddButton() + createCloseButton();
                } else {
                    cells = createAddButton();
                }
            }
            break;
        default:
            break;
    }

    /*   */
    let tableRows = "";
    for (const row of data["data"]) {
        const { number, id, word, translation } = row;
        const tableRow = `
        <tr>
            <th scope="row">${number}<input hidden name="id" value="${id}"></th>
            <td>
                <form onsubmit="return false;">
                    <input name="word" value="${word}" class="text ru-text table-text" minlength="1" maxlength="20" data-lang="ru">
                </form>
            </td>
            <td>
                <form onsubmit="return false;">
                    <input name="translation" value="${translation}" class="text en-text table-text" minlength="2" maxlength="20" data-lang="en">
                </form>
            </td>
            ${cells}
        </tr>`;
        tableRows += tableRow;
    }

    $table.append(tableRows);
    $table.fadeIn(300);
}

export function renderPagination(data) {
    const $pagination = $("#pagination");
    $pagination.empty();

    for (const link of data["links"]) {
        const { url, label, active } = link;
        const activeLink = active ? "active" : "";
        const disabledLink = url === null ? "disabled" : "";
        const linkItem = `<li class="page-item unselectable ${activeLink} ${disabledLink}"><a class="page-link" data-href="${url}" >${label}</a></li>`;
        $pagination.append(linkItem);
    }
}
