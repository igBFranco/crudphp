<?php 
    // realizando as importações
    require_once('funcoes.php');
    // chamando a função para alterar os dados no banco
    alterarEditora();
?>

<?php
    // importando o cabeçalho padrão
    include(HEADER_TEMPLATE);
?>

    <br/>
    <hr/>
    <h1 class="text-center">Alterar Editora</h1>
    <hr/>
    <!-- iniciando o formulário -->
    <form action="altera.php?id=<?php echo $editora[0];?>" id="formAlteraEditora" method="post">
        <div class="container">
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-4">
                        <label for="inputNome">Nome</label>
                        <input type="text" class="form-control" id="inputNome" name="tab_editora[nome_editora]" value="<?php echo $editora[1]; ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputPais">País</label>
                        <input type="text" class="form-control" id="inputPais" name="tab_editora[pais_editora]" value="<?php echo $editora[4]; ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-3">
                        <label for="selectEstado">Estado</label>
                        <select class="form-control" id="selectEstado" name="tab_editora[uf_editora]">
                            <option value="Paraná" <?=($editora[3] == 'Paraná') ? 'selected' : '' ?>>Paraná</option>
                            <option value="Santa Catarina" <?=($editora[3] == 'Santa Catarina') ? 'selected' : '' ?>>Santa Catarina</option>
                            <option value="Rio Grande do Sul" <?=($editora[3] == 'Rio Grande do Sul') ? 'selected' : '' ?>>Rio Grande do Sul</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="selectCidade">Cidade</label>
                        <select class="form-control" id="selectCidade" name="tab_editora[cidade_editora]">
                            <option value="Curitiba" <?=($editora[2] == 'Curitiba') ? 'selected' : '' ?>>Curitiba</option>
                            <option value="Rio Negro" <?=($editora[2] == 'Rio Negro') ? 'selected' : '' ?>>Rio Negro</option>
                            <option value="Florianópolis" <?=($editora[2] == 'Florianópolis') ? 'selected' : '' ?>>Florianópolis</option>
                            <option value="Joinville" <?=($editora[2] == 'Joinville') ? 'selected' : '' ?>>Joinville</option>
                            <option value="Mafra" <?=($editora[2] == 'Mafra') ? 'selected' : '' ?>>Mafra</option>
                            <option value="Porto Alegre" <?=($editora[2] == 'Porto Alegre') ? 'selected' : '' ?>>Porto Alegre</option>
                            <option value="Caxias do Sul" <?=($editora[2] == 'Caxias do Sul') ? 'selected' : '' ?>>Caxias do Sul</option>
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