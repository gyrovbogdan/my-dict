import { updateData } from "./api";

export function updateEvents(token) {
    $(".table-text").on("focus", function () {
        const $this = $(this);
        const $row = $this.closest("tr");
        const buffer = $row.html();
        let dataChanged = false;

        $this.on("keydown", function (e) {
            if (e.key == "Enter") {
                const id = $row.find("input[name=id]").val();
                updateData(id, $this.val(), $this.data("lang"), token);
                dataChanged = true;
                $this.trigger("blur");
            }
        });

        $this.on("blur", function () {
            if (dataChanged) return;
            $this.closest("tr").html(buffer);
        });
    });
}
