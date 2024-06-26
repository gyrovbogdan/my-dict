function init() {
    $(".ru-text").on("input", function () {
        console.log($(this).parent().find(".en-text"));
    });
}

$(init);
