<?php 
    // realizando as importações
    require_once('funcoes.php');
    // chamando a função para alterar os dados no banco
    alterarUsuario();
?>

<?php
    // importando o cabeçalho padrão
    include(HEADER_TEMPLATE);
?>

    <br/>
    <hr/>
    <h1 class="text-center">Alterar Usuário</h1>
    <hr/>
    <!-- iniciando o formulário -->
    <form action="altera.php?id=<?php echo $usuario[0];?>" id="formAlteraUsuario" method="post">
        <div class="container">
            <div class="form-row justify-content-center align-items-center">
                <div class="form-group col-md-4">
                    <label for="inputNome">Nome</label>
                    <input type="text" class="form-control" id="inputNome" name="tab_usuario[nome_usuario]" value="<?php echo $usuario[1]; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCPF">CPF</label>
                    <input type="text" class="form-control" id="inputCPF" name="tab_usuario[cpf_usuario]" value="<?php echo $usuario[4]; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputNasc">Data de Nascimento</label>
                    <input type="text" class="form-control" id="inputNasc" name="tab_usuario[nasc_usuario]" value="<?php echo $usuario[5]; ?>">
                </div>
            </div>
            <div class="form-row justify-content-center align-items-center">
                <div class="form-group col-md-4">
                    <label for="inputEmail">E-Mail</label>
                    <input type="text" class="form-control" id="inputEmail" name="tab_usuario[email_usuario]" value="<?php echo $usuario[6]; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputLogin">Login</label>
                    <input type="text" class="form-control" id="inputLogin" name="tab_usuario[login_usuario]" value="<?php echo $usuario[2]; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputSenha">Senha</label>
                    <input type="text" class="form-control" id="inputSenha" name="tab_usuario[senha_usuario]" value="<?php echo $usuario[3]; ?>">
                </div>
            </div>
            <div class="form-row justify-content-center align-items-center">
                <div class="form-group col-md-4">
                    <label for="inputCelular">Celular</label>
                    <input type="text" class="form-control" id="inputCelular" name="tab_usuario[celular_usuario]" value="<?php echo $usuario[7]; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="selectEstado">Estado</label>
                    <select class="form-control" id="selectEstado" name="tab_usuario[uf_usuario]">
                        <option value="PR" <?=($usuario[9] == 'PR') ? 'selected' : '' ?>>Paraná</option>
                        <option value="SC" <?=($usuario[9] == 'SC') ? 'selected' : '' ?>>Santa Catarina</option>
                        <option value="RS" <?=($usuario[9] == 'RS') ? 'selected' : '' ?>>Rio Grande do Sul</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="selectCidade">Cidade</label>
                    <select class="form-control" id="selectCidade" name="tab_usuario[cidade_usuario]">
                        <option value="Curitiba" <?=($usuario[8] == 'Curitiba') ? 'selected' : '' ?>>Curitiba</option>
                        <option value="Rio Negro" <?=($usuario[8] == 'Rio Negro') ? 'selected' : '' ?>>Rio Negro</option>
                        <option value="Florianópolis" <?=($usuario[8] == 'Florianópolis') ? 'selected' : '' ?>>Florianópolis</option>
                        <option value="Joinville" <?=($usuario[8] == 'Joinville') ? 'selected' : '' ?>>Joinville</option>
                        <option value="Mafra" <?=($usuario[8] == 'Mafra') ? 'selected' : '' ?>>Mafra</option>
                        <option value="Porto Alegre" <?=($usuario[8] == 'Porto Alegre') ? 'selected' : '' ?>>Porto Alegre</option>
                        <option value="Caxias do Sul" <?=($usuario[8] == 'Caxias do Sul') ? 'selected' : '' ?>>Caxias do Sul</option>
                    </select>
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