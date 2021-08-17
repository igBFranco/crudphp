<?php

    require_once('../config.php');
    require_once(DBAPI);

    /** Gerando a listagem de livros **/
    function index() {
        global $autorias;
        global $autores;
        global $livros;
        $autorias = buscarRegistros('tab_autorias');
        $autores = buscarRegistros('tab_autor');
        $livros = buscarRegistros('tab_livro');
    }

    /** buscando um autoria específico */
    function buscaAutoria($id) {
        global $autoria;
        $autoria = buscarRegistros('tab_autorias','id_autoria',$id);
    }

    /** função para atualizar(alterar) os registros  **/
    function alterar() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if (isset($_POST['tab_autorias'])) {
                $autoria = $_POST['tab_autorias'];
                atualizar('tab_autorias', 'id_autoria', $id, $autoria);
                header('location: consultaAutoria.php');
            }
        } 
        else {
            header('location: consultaAutoria.php');
        }
    }

    /** função para atualizar(alterar) os registros  **/
    function excluir() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            deletar('tab_autorias', 'id_autoria', $id);
            header('location: consultaAutoria.php');
        } 
        else {
            header('location: consultaAutoria.php');
        }
    }

?>