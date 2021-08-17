<?php 
    // realizando as importações
    require_once('funcoes.php');
    // executar a função para listar livros
    listarLivros();
    // executar a função para listar as editoras
    buscarEditoras();
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
                <h2>Livros</h2>
            </div>
            <div class="col-sm-6 text-right h2">
                <a class="btn btn-info" href="insere.php"><i class="fa fa-plus"></i>Novo Livro</a>
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
                <th>Editora</th>
                <th>Gênero</th>
                <th>Ano</th>
                <th style="text-align:center">Opções</th>
            </tr>
        </thead>
        <tbody>
            <!-- testando se há livros -->
            <?php if ($livros) : ?>
                <?php foreach ($livros as $livro) : ?>
                    <tr>
                        <td><?php echo $livro[0] ?></td>
                        <td><?php echo $livro[2] ?></td>
                        <td>
                            <?php if ($editoras) :?>
                                <?php foreach($editoras as $editora) : ?>
                                    <!-- comparando chave primária com chave estrangeira -->
                                    <?php if ($editora[0] == $livro[1]) : ?>
                                        <?php echo $editora[1]; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $livro[4] ?></td>
                        <td><?php echo $livro[7] ?></td>
                        <td class="actions">
                            <a href="#" class="btn btn-sm btn-success">Visualizar</a>
                            <a href="altera.php?id=<?php echo $livro[0]; ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="exclui.php?id=<?php echo $livro[0]; ?>" class="btn btn-sm btn-danger" data-confirm="Tem certeza que deseja excluir?">Excluir</a>
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