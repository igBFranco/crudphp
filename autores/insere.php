<?php 
    // realizando as importações
    require_once('funcoes.php');
    // chamando a função para inserir os dados no banco
    adicionarAutor();
?>

<?php
    // importando o cabeçalho padrão
    include(HEADER_TEMPLATE);
?>

    <br/>
    <hr/>
    <h1 class="text-center">Cadastro de Autores</h1>
    <hr/>
    <!-- iniciando o formulário -->
    <form action="insere.php" id="formCadastroAutor" method="post">
        <div class="container">
            <div class="form-row justify-content-center align-items-center">
                <div class="form-group col-md-4">
                    <label for="inputNome">Nome</label>
                    <input type="text" class="form-control" id="inputNome" name="tab_autor[nome_autor]">
                </div>
            </div>
            <div class="form-row justify-content-center align-items-center">
                <div class="form-group col-md-4">
                    <label for="inputNacio">Nacionalidade</label>
                    <input type="text" class="form-control" id="inputNacio" name="tab_autor[nacion_autor]">
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-12" style="text-align:right;">
                    <a href="index.php" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </form>
    <!-- finalizando o formulário -->
    <hr/>
    <br/>
<?php
    // importando o rodapé padrão
    include(FOOTER_TEMPLATE);
?>