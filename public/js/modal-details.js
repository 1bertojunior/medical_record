document.addEventListener('DOMContentLoaded', function() {
    const BASE_URL = '/app/';
    const DETAILS_ENDPOINT = '/details/';

    var buttons = document.querySelectorAll('.btn.btn-info');

    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            var type = this.getAttribute('data-type');
            var modalBody = document.querySelector('#viewModal .modal-body');
            
            modalBody.innerHTML = '<div class="d-flex justify-content-center align-items-center" style="height: 200px;"><img src="/img/default/loading.gif" alt="Carregando..."></div>';

            fetch(`${BASE_URL}${type}${DETAILS_ENDPOINT}${id}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Erro na requisição: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    modalBody.innerHTML = '';
                    var keys = Object.keys(data);
                    var url_current = window.location.href;
                    var path_dom = url_current.split('/').slice(0, 3).join('/');

                    for (var i = 0; i < keys.length ; i++) {
                        var key = keys[i];
                        
                        if (data[key] !== null) {
                            if (key === 'file') {
                                var extension = data[key].split('.').pop();
                                var path_file = `${path_dom}/${data[key]}`;

                                modalBody.innerHTML += `
                                    <div class="row">
                                        <div class="col-sm-3 text-left">
                                            <p class="mb-0">
                                                <a href="${path_file}" target="_blank" class="btn btn-secondary">
                                                    <i class="fas fa-external-link-alt"></i>
                                                </a>
                                            </p>
                                        </div>
                                        <div class="col-sm-6 text-center">
                                            <p class="text-muted mb-0">Preview do arquivo</p>
                                        </div>
                                        <div class="col-sm-3 text-right">
                                            <a href="${path_file}" download class="btn btn-secondary">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <br>
                                `;

                                if (extension === 'pdf') {
                                    modalBody.innerHTML += `<div class="row"><div class="col-sm-12"><embed src="${path_file}" type="application/pdf" width="100%" height="500px" /></div></div>`;
                                } else if (['jpg', 'jpeg', 'png', 'svg'].includes(extension.toLowerCase())) {
                                    modalBody.innerHTML += `<div class="row"><div class="col-sm-12"><img src="${path_file}" class="img-fluid" alt="Preview da Imagem" /></div></div>`;
                                } else {
                                    modalBody.innerHTML += '<p>Arquivo não disponível para visualização e/ou review não disponível para este tipo de arquivo.</p>';
                                }
                            } else {
                                modalBody.innerHTML += `
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">${key.charAt(0).toUpperCase() + key.slice(1)}</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">${data[key]}</p>
                                        </div>
                                    </div>
                                `;
                            }

                            if (i < keys.length - 1) { 
                                modalBody.innerHTML += '<hr>';
                            }
                        }
                    }
                })        
                .catch(error => {
                    modalBody.innerHTML = `<p>Erro na requisição: ${error.message}</p>`;
                });
        });
    });
});
