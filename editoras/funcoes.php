<?php 
    // importações
    require_once('../config.php');
    require_once(DBAPI);

    /**
     * realizando a busca de todos as editoras
     */
    function listarEditoras() {
        // criando uma variável global para receber os dados da consulta
        global $editoras;
        // executando a função para listar os editoras e armazenando o resultado na variável
        $editoras = buscarRegistros('tab_editora');
    }

    /**
     * recuperando os valores postados e 
     * encaminhando para o banco
     */
    function adicionarEditora() {
        // testando se estão sendo postados dados
        if (!empty($_POST['tab_editora'])) {
            // se o POST está sendo válido, salva os dados da tela na variável
            $editora = $_POST['tab_editora'];
            // executando a função para executar a inserção na tabela do banco
            salvar('tab_editora',$editora);
            // após a execução da função salvar, redireciona para a 'index'
            header('location: index.php');
        }
    }

    /** 
     * realizando a alteração de um registro carregado
     * a partir da tela de consulta
     */
    function alterarEditora() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if (isset($_POST['tab_editora'])) {
                $editora = $_POST['tab_editora'];        
                atualizar('tab_editora', 'id_editora', $id, $editora);
                header('location: index.php');
            }
            else {
                global $editora;
                $editora = buscarRegistros('tab_editora', 'id_editora', $id);
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
    function excluirEditora() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            deletar('tab_editora', 'id_editora', $id);
            header('location: index.php');
        } 
        else {
            header('location: index.php');
        }
    }
?>