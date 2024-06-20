const data = [
    {
        id: 1,
        word: "Слово",
        translation: "Word",
    },
    {
        id: 2,
        word: "Слово",
        translation: "Word",
    },
    {
        id: 3,
        word: "Слово",
        translation: "Word",
    },
];

let table = $("#dictionary-body");
let tableContent = table.html();

const rowToJSON = (row) => {
    const inputs = $(row).find("input").toArray();
    const values = {};
    for (const input of inputs) {
        values[input.name] = input.value;
    }
    return values;
};

const createRow = (data) =>
    `<tr>
        <th scope="row"><input name='id' value=${data.id} disabled class='text'></th>
        <td><input name='word' value=${data.word} class='text'></td>
        <td><input name='translation' value=${data.translation} class='text'></td>
    </tr>`;

for (const row of data) {
    tableContent += createRow(row);
}

const endNumber = data.length + 1;

const endRow = () =>
    `<tr>
        <th scope="row">${endNumber}</th>
        <td><input value='' class='text' placeholder='Введите слово...'></td>
        <td><input value='' class='text' placeholder='Enter word...'></td>
    </tr>`;

table.html(tableContent + endRow);

$(".text").on("input", function () {
    const row = $(this).closest("tr");
    console.log(JSON.stringify(rowToJSON(row)));
});
