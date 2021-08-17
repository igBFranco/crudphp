<?php 
    // realizando as importações
    require_once('funcoes.php');
    // chamando a função para alterar os dados no banco
    alterarLivro();
    // chamando a função para listar as editoras
    buscarEditoras();
?>

<?php
    // importando o cabeçalho padrão
    include(HEADER_TEMPLATE);
?>

    <br/>
    <hr/>
    <h1 class="text-center">Alterar Livro</h1>
    <hr/>
    <!-- iniciando o formulário -->
    <form action="altera.php?id=<?php echo $livro[0];?>" id="formAlteraLivro" method="post">
        <div class="container">
            <div class="form-row justify-content-center align-items-center">
                <div class="form-group col-md-4">
                    <label for="inputNome">Nome</label>
                    <input type="text" class="form-control" id="inputNome" name="tab_livro[nome_livro]" value="<?php echo $livro[2]; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputNomeOriginal">Nome Original</label>
                    <input type="text" class="form-control" id="inputNomeOriginal" name="tab_livro[nomeoriginal_livro]" value="<?php echo $livro[3]; ?>">
                </div>
            </div>
            <div class="form-row justify-content-center align-items-center">
                <div class="form-group col-md-3">
                <label for="selectEditora">Editora</label>
                    <select type="text" class="form-control" id="selectEditora" name="tab_livro[editora_livro]">
                        <?php if($editoras) : ?>
                            <?php foreach($editoras as $editora) :?>
                                <option value="<?php echo $editora[0]; ?>" <?php if ($livro[1] == $editora[0]) echo 'selected="select"'; ?>><?php echo $editora[1]?></option>
                            <?php endforeach;?>
                        <?php else : ?>
                            <option>Não foi possível obter os dados do banco!</option>	
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputGenero">Gênero</label>
                    <input type="text" class="form-control" id="inputGenero" name="tab_livro[genero_livro]" value="<?php echo $livro[4]; ?>">
                </div>
                <div class="form-group col-md-1">
                    <label for="inputPaginas">Páginas</label>
                    <input type="text" class="form-control" id="inputPaginas" name="tab_livro[paginas_livro]" value="<?php echo $livro[6]; ?>">
                </div>
                <div class="form-group col-md-1">
                    <label for="inputAno">Ano</label>
                    <input type="text" class="form-control" id="inputAno" name="tab_livro[anopub_livro]" value="<?php echo $livro[7]; ?>">
                </div>
            </div>
            <div class="form-row justify-content-center align-items-center">
                <div class="form-group col-md-8">
                    <label for="inputSinopse">Sinopse</label>
                    <textarea class="form-control rounded-0" id="inputSinopse" rows="8" name="tab_livro[sinopse_livro]"><?php echo $livro[5]; ?></textarea>

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