document.addEventListener('DOMContentLoaded', function() {
    var buttons = document.querySelectorAll('.btn.btn-info');

    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            var type = this.getAttribute('data-type');
            var modalBody = document.querySelector('#viewModal .modal-body');
            
            modalBody.innerHTML = ''; // Limpa o modalBody
            modalBody.innerHTML = '<div class="d-flex justify-content-center align-items-center" style="height: 200px;"><img src="/img/default/loading.gif" alt="Carregando..."></div>';

            fetch('/app/' + type + '/details/' + id)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro na requisição: ' + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    modalBody.innerHTML = ''; // Limpa o modalBody
                    var keys = Object.keys(data);
                    for (var i = 0; i < keys.length - 2; i++) {
                        var key = keys[i];
                        if (data[key] !== null) { // Verifica se o valor não é null
                            modalBody.innerHTML += '<p>' + key.charAt(0).toUpperCase() + key.slice(1) + ': ' + data[key] + '</p>';
                        }
                    }
                })
                .catch(error => {
                    modalBody.innerHTML = '<p>Erro: ' + error.message + '</p>';
                });
        });
    });
});
