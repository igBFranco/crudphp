<?php

    require_once('../config.php');
    require_once(DBAPI);

    /** Gerando a listagem de livros **/
    function index() {
        global $emprestimos;
        global $usuarios;
        global $livros;
        $emprestimos = buscarRegistros('tab_emprestimos');
        $usuarios = buscarRegistros('tab_usuario');
        $livros = buscarRegistros('tab_livro');
    }

    /** buscando um emprestimo específico */
    function buscaEmprestimo($id) {
        global $emprestimo;
        $emprestimo = buscarRegistros('tab_emprestimos','id_emprestimo',$id);
    }

    /** função para atualizar(alterar) os registros  **/
    function alterar() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if (isset($_POST['tab_emprestimos'])) {
                $emprestimo = $_POST['tab_emprestimos'];
                atualizar('tab_emprestimos', 'id_emprestimo', $id, $emprestimo);
                header('location: consultaEmprestimo.php');
            }
        } 
        else {
            header('location: consultaEmprestimo.php');
        }
    }

    /** função para atualizar(alterar) os registros  **/
    function excluir() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            deletar('tab_emprestimos', 'id_emprestimo', $id);
            header('location: consultaEmprestimo.php');
        } 
        else {
            header('location: consultaEmprestimo.php');
        }
    }

?>