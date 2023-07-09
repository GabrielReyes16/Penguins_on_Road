<x-app-layout>
    <br>
    <div class="rectangulo"> {{ __('Terrible') }}</div>
    <br>
    <div class="container">
        <div class="container-sm">
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <form id="search-form" class="buscador text-center">
                        <div class="input-group">
                            <input id="search-input" type="text" placeholder="Buscar por nombre o email" class="form-control">
                            <button id="clear-button" type="button" class="btn btn-primary">Limpiar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
                
    <script>
        var searchInput = document.getElementById('search-input');
        var clearButton = document.getElementById('clear-button');
        var rows = Array.from(document.querySelectorAll('#users-table tbody tr'));
        searchInput.addEventListener('input', function() {
            var searchValue = this.value.toLowerCase();
            rows.forEach(function(row) {
                var name = row.querySelector('.user-name').innerText.toLowerCase();
                var email = row.querySelector('.user-email').innerText.toLowerCase();

                if (name.includes(searchValue) || email.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
        clearButton.addEventListener('click', function() {
            searchInput.value = '';

            rows.forEach(function(row) {
                row.style.display = '';
            });
        });
    </script>

</x-app-layout>
