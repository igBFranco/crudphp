$( document ).ready(function() {
    function populaEstados() {
        const ufSelect = document.querySelector("select[id=selectEstado]")
        fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados")
            .then( (res) => res.json() )
            .then( states => {
                for(const state of states) {
                    ufSelect.innerHTML += `<option value="${state.sigla}">${state.nome}</option>`
                }
            })
    }

    populaEstados();

    function populaCidades(event) {
        const cidadeSelect = document.querySelector("#selectCidade")
        const estadoSigla = event.target.value
        const url = `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estadoSigla}/municipios`
        cidadeSelect.innerHTML = ''
        fetch(url)
            .then((res) => res.json())
            .then(cities => {
                for(const city of cities) {
                    cidadeSelect.innerHTML += `<option value="${city.nome}">${city.nome}</option>`
                }
                cidadeSelect.disabled = false
            })
    }

    document
        .querySelector("#selectEstado")
        .addEventListener("change", populaCidades);

    
    // chamando o modal de exclusão
    $('a[#data-confirm]').click(function(ev){
		// a variável href vai receber o valor do parâmentro 'href' da tag 'a', ou seja
		// qual será o arquivo '.php' que será responsável pela exclusão do registro
		var href = $(this).attr('href');
		if(!$('#confirm-delete').length) {
			$('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">EXCLUIR ITEM<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza de que deseja excluir o item selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataConfirmOK">Excluir</a></div></div></div></div>');
		}
		$('#dataConfirmOK').attr('href',href);
		$('#confirm-delete').modal({show: true});
		return false;
	});
});