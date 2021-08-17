<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = conectaMysql() ?>

    <br/>
    <h1 class="text-center">Área de Trabalho (DASHBOARD)</h1>
    <hr/>
    <br />

    <?php if ($db) : ?>
    
        <div class="row text-center">
            <!-- criando o botão para novo empréstimo -->
            <div class="col-xs-6 col-sm-3 col-md-2">
                <a href="/crudphp/emprestimos/emprestimos.php" class="btn btn-info">
                    <div>
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div>
                        <p>Empréstimos</p>
                    </div>
                </a>
            </div>
            <!-- criando o botão para cadastro de novo usuário -->
            <div class="col-xs-6 col-sm-3 col-md-2">
                <a href="/crudphp/usuarios/insere.php" class="btn btn-info">
                    <div>
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div>
                        <p>Novo Usuário</p>
                    </div>
                </a>
            </div>
            <!-- criando o botão para cadastro de novo livro -->
            <div class="col-xs-6 col-sm-3 col-md-2">
                <a href="/crudphp/livros/insere.php" class="btn btn-info">
                    <div>
                        <i class="fa fa-book-open fa-5x"></i>
                    </div>
                    <div>
                        <p>Novo Livro</p>
                    </div>
                </a>
            </div>
            <!-- criando o botão para cadastro de novo autor -->
            <div class="col-xs-6 col-sm-3 col-md-2">
                <a href="/crudphp/autores/insere.php" class="btn btn-info">
                    <div>
                        <i class="fa fa-user-tie fa-5x"></i>
                    </div>
                    <div>
                        <p>Novo Autor</p>
                    </div>
                </a>
            </div>
            <!-- criando o botão para cadastro de nova editora -->
            <div class="col-xs-6 col-sm-3 col-md-2">
                <a href="/crudphp/editoras/insere.php" class="btn btn-info">
                    <div>
                        <i class="fa fa-store-alt fa-5x"></i>
                    </div>
                    <div>
                        <p>Nova Editora</p>
                    </div>
                </a>
            </div>
        </div>

    <?php else : ?>
        <div class="alert alert-danger" role="alert">
            <p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
        </div>

    <?php endif; ?>
    
    <hr />

<?php include(FOOTER_TEMPLATE); ?>       