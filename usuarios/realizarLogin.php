<?php
    // iniciando uma sessão
    session_start();
    // acessando o arquivo de configurações do sistema
    require_once('../config.php');
    // acessando a variável global do sistema que contém o caminho para o arquivo com os comandos de banco de dados
    require_once(DBAPI);
    // obtendo os valores do formulário 
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    // abrindo a conexão com o banco
    $con = conectaMysql();
    // montando a instrução 'select' para buscar o usuário na tabela
    $sql = "select * from tab_usuario where login_usuario = '$usuario' and senha_usuario = '$senha';";
    // executando o 'select' no banco de dados
    $result = mysqli_query($con,$sql);
    // testando a execução da consulta
    if ($result) {
        // criando um 'array' para armazenar o resultado do 'select'
        $dados = mysqli_fetch_array($result);
        // testando a execução da consulta
        // var_dump($dados);
        if (isset($dados['login_usuario'])) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['senha'] = $senha;
            header('Location: ../home.php');
        }
        else {
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            // echo 'Usuário Inválido!';
            // caso ocorra erro na autenticação, o usuário será redirecionado para a 'index' 
            // e receberá uma mensagem sober o erro
            header('Location: ../index.php?erro=1');
        }
    }
    else {
        echo 'Erro na execução da consulta!';        
    } 
?>