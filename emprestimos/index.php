<?php 
    // realizando as importações
    require_once('funcoes.php');
    // executar a função para listar emprestimos
    listarEmprestimos();

    buscarUsuarios();
?>

<?php
    // importando o cabeçalho padrão
    include(HEADER_TEMPLATE);
?>

    <br/>
    <hr/>
    <header>
        <div class="row">
            <div class="col-sm-6">
                <h2>Empréstimos</h2>
            </div>
            <div class="col-sm-6 text-right h2">
                <a class="btn btn-info" href="insere.php"><i class="fa fa-plus"></i>Novo Empréstimo</a>
                <a class="btn btn-secondary" href="index.php"><i class="fa fa-refresh"></i>Atualizar</a>
            </div>
        </div> 
    </header>
    <hr/>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Data Empréstimo</th>
                <th style="text-align:center">Opções</th>
            </tr>
        </thead>
        <tbody>
            <!-- testando se há livros -->
            <?php if ($emprestimos) : ?>
                <?php foreach ($emprestimos as $emprestimo) : ?>
                    <tr>
                        <td><?php echo $emprestimo[0] ?></td>
                        <td>
                            <?php if ($usuarios) : ?>
                                <?php foreach($usuarios as $usuario) : ?>
                                    <!-- comparando chave primária com chave estrangeira-->
                                    <?php if($usuario[0] == $emprestimo[1]) : ?>
                                        <?php echo $usuario[1] ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?> 
                        </td>
                        <td><?php echo $emprestimo[2] ?></td>
                        <td class="actions">
                            <a href="#" class="btn btn-sm btn-success">Visualizar</a>
                            <a href="altera.php?id=<?php echo $emprestimo[0]; ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="#" class="btn btn-sm btn-danger">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4">Nenhum registro encontrado!</td>
                </tr>
            <?php endif; ?>           
        </tbody>    
    </table>
    <hr/>

    <?php include(FOOTER_TEMPLATE); ?>