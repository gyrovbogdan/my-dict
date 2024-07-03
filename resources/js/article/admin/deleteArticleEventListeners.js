export function deleteArticleEventListeners(articleId, csrfToken) {
    $("#delete-article").on("click", () => {
        $.ajax({
            method: "POST",
            url: `/article/${articleId}`,
            data: {
                _token: csrfToken,
                _method: "DELETE",
            },
            success: function (response) {
                window.location.replace("/article");
            },
        });
    });
}
