<?php
	// realizando a importação do arquivo que contem a função para inserir os usuários no banco
    require_once('funcoes.php');
    // executando a função para obter os usuários e livros e popular os respectivos 'comboboxes'
    index();
?>

<?php
	include(HEADER_TEMPLATE);
?>
            <br/>
            <h1 class="text-center">Autorias</h1>
			<hr/>
            <!-- Iniciando o formulário -->
            <!-- como estamos utilizando o 'ajax' para fazer o insert no banco, o formulário perde o atributo 'action' -->
			<form method="post" id="formCadastrarEmprestimo">
				<div class="form-row">
					<div class="form-group col-md-4"></div>
					<div class="form-group col-md-4">
                        <label for="selectLivro">Livro</label>
						<select type="text" class="form-control" id="selectLivro" name="livro">
							<?php if($livros) : ?>
								<?php foreach($livros as $livro) :?>
									<option value="<?php echo $livro[0];?>"><?php echo $livro[2]?></option>
								<?php endforeach;?>
							<?php else : ?>
								<option>Não foi possível obter os dados do banco!</option>	
							<?php endif; ?>
						</select>						
					</div>
                </div>
                <div class="form-row">
					<div class="form-group col-md-4"></div>
					<div class="form-group col-md-4">						
						<label for="selectAutores">Autor</label>
						<select type="text" class="form-control" id="selectAutores" name="autor">
							<?php if($autores) : ?>
								<?php foreach($autores as $autor) :?>
									<option value="<?php echo $autor[0];?>"><?php echo $autor[1]?></option>
								<?php endforeach;?>
							<?php else : ?>
								<option>Não foi possível obter os dados do banco!</option>	
							<?php endif; ?>
						</select>
					</div>
					<div class="form-group col-md-2"></div>
                </div>
                <div class="form-row">
                    <button type="button" name="add" id="add" class="btn btn-info">Adicionar</button>
                </div>
                <hr />
                <div class="form-row">
                    <div class="form-group col-md-2"></div>
                    <div class="form-group col-md-8">
                        <table class="table table-striped" id="dados_livro">
                            <thead>
                                <tr>
                                <th style="width: 10%">idLivro</th>
                                <th style="width: 40%">Livro</th>
                                <th style="width: 30%">Autor</th>
                                <th style="width: 20%">Remover</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="form-group col-md-2"></div>
                </div>
                
                
				
				<hr />				
                <input type="submit" name="insert" id="insert" class="btn btn-primary" value="Salvar">
                <a class="btn btn-secondary" href="index.php">Voltar</a>
			</form>
			<!-- Finalizando o formulário -->

            <hr/>

		
			<br/>

<br/>

<?php include(FOOTER_TEMPLATE); ?>

<!-- adicionando o script para pegar os dados do livro e adicionar na tabela -->
<script>  
    // vai executar somente depois da página ter sido carregada completamente
    $(document).ready(function(){ 
        var count = 0;
        var idLivro = '';
        var nomeLivro = '';
        var nomeAutor = '';
        // # = id       . = class
        $('#add').click(function(){
            idLivro = $('#selectLivro').val();
            nomeLivro = $('#selectLivro :selected').text();
            nomeAutor = $('#selectAutores :selected').text();
            // a linha abaixo serve para evitar problemas de cópias de codigo fonte
            if($('#add').text() == 'Adicionar') {
                count = count + 1;
                // gerando dinâmicamente uma nova linha na tabela para cada livro que for inserido
                output = '<tr id="row_'+count+'">';
                output += '<td>'+idLivro+' <input type="hidden" name="hidden_idLivro[]" id="idLivro'+count+'" class="idLivro" value="'+idLivro+'" /></td>';
                output += '<td>'+nomeLivro+' <input type="hidden" name="hidden_nomeLivro[]" id="nomeLivro'+count+'" class="nomeLivro" value="'+nomeLivro+'" /></td>';
                output += '<td>'+nomeAutor+' <input type="hidden" name="hidden_nomeAutor[]" id="nomeAutor'+count+'" class="nomeAutor" value="'+nomeAutor+'" /></td>';
                output += '<td><button type="button" name="remover" class="btn btn-danger btn-xs remover" id="'+count+'">Remover</button></td>';
                // fechando a tag 'tr', ou seja, finalizando a linha dinâmica
                output += '</tr>';
                // adicionado a linha gerada via código na tabela do formulário
                $('#dados_livro').append(output);
            }
            // o laço de else abaixo só irá funcionar caso exista mais de um botão que possua a 'id' "add"
            else {
                var row_id = $('#hidden_row_id').val();
                output += '<td>'+idLivro+' <input type="hidden" name="hidden_idLivro[]" id="idLivro'+row_id+'" class="idLivro" value="'+idLivro+'" /></td>';
                output += '<td>'+nomeLivro+' <input type="hidden" name="hidden_nomeLivro[]" id="nomeLivro'+row_id+'" class="nomeLivro" value="'+nomeLivro+'" /></td>';
                output += '<td>'+nomeAutor+' <input type="hidden" name="hidden_nomeAutor[]" id="nomeAutor'+row_id+'" class="nomeAutor" value="'+nomeAutor+'" /></td>';
                output += '<td><button type="button" name="remover" class="btn btn-danger btn-xs remover" id="'+row_id+'">Remover</button></td>';
                $('#row_'+row_id+'').html(output);                
            }
        });
        // a função abaixo será executada se for clicado no botão 'Remover' de alguma linha da tabela
        $(document).on('click', '.remover', function(){
            var row_id = $(this).attr("id");
            if(confirm("Você realmente quer remover este registro?")) {
                $('#row_'+row_id+'').remove();
            }
            else {
                return false;
            }
        });
        // a função abaixo será executada quando for realizado o 'submit' do formulário
        $('#formCadastrarEmprestimo').on('submit', function(event){
            event.preventDefault();
            // a variável 'count_data' servirá para contar/obter o número de linhas da tabela de livros
            var count_data = 0;
            // a função abaixo irá ser executada para cada ocorrência em componentes que pertençam à classe
            // 'idLivro'
            $('.idLivro').each(function(){
                count_data = count_data + 1;
            });
            // verificando se existem livros
            if(count_data > 0) {
                // a variável 'form_data' irá receber (serialize()) todos os dados da tela (table)
                var form_data = $(this).serialize();
                // acionando o método 'Ajax' para enviar os dados para o banco
                $.ajax({
                    // a propriedade 'url' serve para indicar qual arquivo irá receber os dados via 'ajax'
                    // e dar continuidade ao processo
                    url:"insereAutoria.php",
                    // url: 'funcoes.php' index() adicionar() alterar('id')
                    // qual o método que será utilizado para o envio do formulário
                    method:"POST",
                    // quais dados serão enviados
                    data:form_data,
                    // data: {'autor':'01', 'data_autoria':'2020-07-01'}
                }).done(function(response) {
                    // o método ,done() serve para indicar a ação que será tomada após a execução do método 'ajax'
                    // redirecionando para uma página específica
                    window.location.href='../home.php'
                });

            }
            else {
                alert('Por favor adicione pelo menos um livro!');
            }
        });
 
    });
</script>

