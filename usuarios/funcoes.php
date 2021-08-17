<?php 
    // importações
    require_once('../config.php');
    require_once(DBAPI);

    /**
     * realizando a busca de todos os usuários
     */
    function listarUsuarios() {
        // criando uma variável global para receber os dados da consulta
        global $usuarios;
        // executando a função para listar os autores e armazenando o resultado na variável
        $usuarios = buscarRegistros('tab_usuario');
    }

    /**
     * recuperando os valores postados e 
     * encaminhando para o banco
     */
    function adicionarUsuario() {
        // testando se estão sendo postados dados
        if (!empty($_POST['tab_usuario'])) {
            // se o POST está sendo válido, salva os dados da tela na variável
            $usuario = $_POST['tab_usuario'];
            // executando a função para executar a inserção na tabela do banco
            salvar('tab_usuario',$usuario);
            // após a execução da função salvar, redireciona para a 'index'
            header('location: index.php');
        }
    }

    /** 
     * realizando a alteração de um registro carregado
     * a partir da tela de consulta
     */
    function alterarUsuario() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if (isset($_POST['tab_usuario'])) {
                $usuario = $_POST['tab_usuario'];        
                atualizar('tab_usuario', 'id_usuario', $id, $usuario);
                header('location: index.php');
            }
            else {
                global $usuario;
                $usuario = buscarRegistros('tab_usuario', 'id_usuario', $id);
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
    function excluirUsuario() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            deletar('tab_usuario', 'id_usuario', $id);
            header('location: index.php');
        } 
        else {
            header('location: index.php');
        }
    }
?>