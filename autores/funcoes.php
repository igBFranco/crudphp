<?php 
    // importações
    require_once('../config.php');
    require_once(DBAPI);

    /**
     * realizando a busca de todos os autores
     */
    function listarAutores() {
        // criando uma variável global para receber os dados da consulta
        global $autores;
        // executando a função para listar os autores e armazenando o resultado na variável
        $autores = buscarRegistros('tab_autor');
    }

    /**
     * recuperando os valores postados e 
     * encaminhando para o banco
     */
    function adicionarAutor() {
        // testando se estão sendo postados dados
        if (!empty($_POST['tab_autor'])) {
            // se o POST está sendo válido, salva os dados da tela na variável
            $autor = $_POST['tab_autor'];
            // executando a função para executar a inserção na tabela do banco
            salvar('tab_autor',$autor);
            // após a execução da função salvar, redireciona para a 'index'
            header('location: index.php');
        }
    }

    /** 
     * realizando a alteração de um registro carregado
     * a partir da tela de consulta
     */
    function alterarAutor() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if (isset($_POST['tab_autor'])) {
                $autor = $_POST['tab_autor'];        
                atualizar('tab_autor', 'id_autor', $id, $autor);
                header('location: index.php');
            }
            else {
                global $autor;
                $autor = buscarRegistros('tab_autor', 'id_autor', $id);
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
    function excluirAutor() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            deletar('tab_autor', 'id_autor', $id);
            header('location: index.php');
        } 
        else {
            header('location: index.php');
        }
    }
?>