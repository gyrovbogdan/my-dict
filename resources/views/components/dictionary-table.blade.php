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
        </thead>
        <tbody id='dictionary-body'>
        </tbody>
    </table>
</div>


<script type='module' src='{{ asset('js/dictionary-table.js') }}'></script>
