<table id='dict' class="table" style="height: 500px">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Слово</th>
            <th scope="col">Перевод</th>
            <td class="p-0" style="width: 30px; height: 30px;">
            </td>
            @admin
                <td class="p-0" style="width: 30px; height: 30px;">
                </td>
            @endadmin
        </tr>

        @admin
            <tr>
                <th scope="row">...<input hidden name="id"></th>
                <td><input name="word" placeholder="Слово..." class="text ru-text new-text" minlength="2" maxlength="20"
                        data-lang="ru">
                </td>
                <td><input name="translation" placeholder="Transtation..." class="text en-text new-text" minlength="2"
                        maxlength="20" data-lang="en"></td>
                <td class="p-0" style="width: 30px; height: 30px;">
                </td>
                <td>
                </td>
            </tr>
        @endadmin

    </thead>
    <tbody id='table'>
    </tbody>
    <tr>
    </tr>
</table>

<nav>
    <ul class="pagination" id='pagination'>
    </ul>
</nav>
