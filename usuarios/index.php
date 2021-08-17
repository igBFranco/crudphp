<?php 
    // realizando as importações
    require_once('funcoes.php');
    // executar a função para listar usuários
    listarUsuarios();
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
                <h2>Usuários</h2>
            </div>
            <div class="col-sm-6 text-right h2">
                <a class="btn btn-info" href="insere.php"><i class="fa fa-plus"></i>Novo Usuário</a>
                <a class="btn btn-secondary" href="index.php"><i class="fa fa-refresh"></i>Atualizar</a>
            </div>
        </div> 
    </header>
    <hr/>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Login</th>
                <th>E-Mail</th>
                <th style="text-align:center">Opções</th>
            </tr>
        </thead>
        <tbody>
            <!-- testando se há usuários -->
            <?php if ($usuarios) : ?>
                <?php foreach ($usuarios as $usuario) : ?>
                    <tr>
                        <td><?php echo $usuario[0] ?></td>
                        <td><?php echo $usuario[1] ?></td>
                        <td><?php echo $usuario[2] ?></td>
                        <td><?php echo $usuario[6] ?></td>
                        <td class="actions">
                            <a href="#" class="btn btn-sm btn-success">Visualizar</a>
                            <a href="altera.php?id=<?php echo $usuario[0]; ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="exclui.php?id=<?php echo $usuario[0]; ?>" class="btn btn-sm btn-danger" data-confirm="Tem certeza que deseja excluir o registro selecionado?">Excluir</a>
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