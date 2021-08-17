<?php 
    // realizando as importações
    require_once('funcoes.php');
    // chamando a função para inserir os dados no banco
    adicionarEditora();
?>

<?php
    // importando o cabeçalho padrão
    include(HEADER_TEMPLATE);
?>

    <br/>
    <hr/>
    <h1 class="text-center">Cadastro de Editoras</h1>
    <hr/>
    <!-- iniciando o formulário -->
    <form action="insere.php" id="formCadastroEditora" method="post">
        <div class="container">
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-4">
                        <label for="inputNome">Nome</label>
                        <input type="text" class="form-control" id="inputNome" name="tab_editora[nome_editora]">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputPais">País</label>
                        <input type="text" class="form-control" id="inputPais" name="tab_editora[pais_editora]">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-3">
                        <label for="selectEstado">Estado</label>
                        <select class="form-control" id="selectEstado" name="tab_editora[uf_editora]">
                            <option value="Paraná">Paraná</option>
                            <option value="Santa Catarina">Santa Catarina</option>
                            <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="selectCidade">Cidade</label>
                        <select class="form-control" id="selectCidade" name="tab_editora[cidade_editora]">
                            <option value="Curitiba">Curitiba</option>
                            <option value="Rio Negro">Rio Negro</option>
                            <option value="Florianópolis">Florianópolis</option>
                            <option value="Joinville">Joinville</option>
                            <option value="Mafra">Mafra</option>
                            <option value="Porto Alegre">Porto Alegre</option>
                            <option value="Caxias do Sul">Caxias do Sul</option>
                        </select>
                    </div>
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