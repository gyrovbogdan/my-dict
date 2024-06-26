<style>
    input.text {
        background-color: transparent;
        border: 0;
        font-size: 1em;
    }
</style>

<div>
    <table id='dict' class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Слово</th>
                <th scope="col">Перевод</th>
            </tr>

            <th scope="row">...<input hidden name="id"></th>
            <td><input name="word" placeholder="Слово..." class="text ru-text new-text" minlength="2" maxlength="20"
                    data-lang="ru">
            </td>
            <td><input name="translation" placeholder="Transtation..." class="text en-text new-text" minlength="2"
                    maxlength="20" data-lang="en"></td>

        </thead>
        <tbody id='dictionary-body'>
            <tr>
            </tr>
        </tbody>
    </table>
</div>
