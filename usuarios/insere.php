<?php 
    // realizando as importações
    require_once('funcoes.php');
    // chamando a função para inserir os dados no banco
    adicionarUsuario();
?>

<?php
    // importando o cabeçalho padrão
    include(HEADER_TEMPLATE);
?>

    <br/>
    <hr/>
    <h1 class="text-center">Cadastro de Usuários</h1>
    <hr/>
    <!-- iniciando o formulário -->
    <form action="insere.php" id="formCadastroUsuario" method="post">
        <div class="container">
            <div class="form-row justify-content-center align-items-center">
                <div class="form-group col-md-4">
                    <label for="inputNome">Nome</label>
                    <input type="text" class="form-control" id="inputNome" name="tab_usuario[nome_usuario]">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCPF">CPF</label>
                    <input type="text" class="form-control" id="inputCPF" name="tab_usuario[cpf_usuario]">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputNasc">Data de Nascimento</label>
                    <input type="text" class="form-control" id="inputNasc" name="tab_usuario[nasc_usuario]">
                </div>
            </div>
            <div class="form-row justify-content-center align-items-center">
                <div class="form-group col-md-4">
                    <label for="inputEmail">E-Mail</label>
                    <input type="text" class="form-control" id="inputEmail" name="tab_usuario[email_usuario]">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputLogin">Login</label>
                    <input type="text" class="form-control" id="inputLogin" name="tab_usuario[login_usuario]">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputSenha">Senha</label>
                    <input type="text" class="form-control" id="inputSenha" name="tab_usuario[senha_usuario]">
                </div>
            </div>
            <div class="form-row justify-content-center align-items-center">
                <div class="form-group col-md-4">
                    <label for="inputCelular">Celular</label>
                    <input type="text" class="form-control" id="inputCelular" name="tab_usuario[celular_usuario]">
                </div>
                <div class="form-group col-md-2">
                    <label for="selectEstado">Estado</label>
                    <select class="form-control" id="selectEstado" name="tab_usuario[uf_usuario]">
                        <option value="">Selecione o Estado</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="selectCidade">Cidade</label>
                    <select class="form-control" id="selectCidade" name="tab_usuario[cidade_usuario]" disabled>
                        <option value="">Selecione a Cidade</option>
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