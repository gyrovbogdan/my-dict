export function pagination(data, token, displayData) {
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
        $(".page-item").removeClass("active");
        $(this).addClass("active");
        displayData(url, token);
    });
}
