<?php 
    // importações
    require_once('../config.php');
    require_once(DBAPI);

    /**
     * realizando a busca de todos os livros
     */
    function listarLivros() {
        // criando uma variável global para receber os dados da consulta
        global $livros;
        // executando a função para listar os liros e armazenando o resultado na variável
        $livros = buscarRegistros('tab_livro');
    }

    /**
     * realizando a busca das editoras
     */
    function buscarEditoras() {
        // definindo uma variável global para armazenar as editoras
        global $editoras;
        // executando a função para listar as editoras
        $editoras = buscarRegistros('tab_editora');
    }

    /**
     * recuperando os valores postados e 
     * encaminhando para o banco
     */
    function adicionarLivro() {
        // testando se estão sendo postados dados
        if (!empty($_POST['tab_livro'])) {
            // se o POST está sendo válido, salva os dados da tela na variável
            $livro = $_POST['tab_livro'];
            // executando a função para executar a inserção na tabela do banco
            salvar('tab_livro',$livro);
            // após a execução da função salvar, redireciona para a 'index'
            header('location: index.php');
        }
    }

    /** 
     * realizando a alteração de um registro carregado
     * a partir da tela de consulta
     */
    function alterarLivro() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if (isset($_POST['tab_livro'])) {
                $livro = $_POST['tab_livro'];        
                atualizar('tab_livro', 'id_livro', $id, $livro);
                header('location: index.php');
            }
            else {
                global $livro;
                $livro = buscarRegistros('tab_livro', 'id_livro', $id);
            } 
        } 
        else {
            header('location: index.php');
        }
    }

    /** 
    * realizando a exclusão de um registro
    * a partir da tela de consulta
    */
    function excluirLivro() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            deletar('tab_livro', 'id_livro', $id);
            header('location: index.php');
        } 
        else {
            header('location: index.php');
        }
    }
?>