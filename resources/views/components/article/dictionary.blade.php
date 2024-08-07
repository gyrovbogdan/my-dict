<div style="height: 665px;">
    <div style="height: 628px">
        <table id='dict' class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Слово</th>
                    <th scope="col">Перевод</th>
                    <td>
                    </td>
                    @admin
                        <td>
                        </td>
                    @endadmin
                </tr>
            </thead>

            @admin
                <tr>
                    <th scope="row">...<input hidden name="id"></th>
                    <td>
                        <form class="text-input" onsubmit="return false;">
                            <input name="word" placeholder="Слово..." class="text ru-text new-text" minlength="2"
                                maxlength="20" data-lang="ru">
                        </form>
                    </td>
                    <td>
                        <form class="text-input" onsubmit="return false;">
                            <input name="translation" placeholder="Transtation..." class="text en-text new-text"
                                minlength="2" maxlength="20" data-lang="en">
                        </form>
                    </td>
                    <td class="p-0">
                    </td>
                    <td>
                    </td>
                </tr>
            @endadmin

            <tbody id='table'>
            </tbody>
            <tr>
            </tr>
        </table>
    </div>

    <nav>
        <ul class="pagination justify-content-center" id='pagination'>
        </ul>
    </nav>
</div>
