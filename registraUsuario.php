<?php
    // iniciando uma sessão
    session_start();
    // acessando o arquivo de configurações do sistema
    require_once('config.php');
    // acessando a variável global do sistema que contém o caminho para o arquivo com os comandos de banco de dados
    require_once(DBAPI);
    // obtendo os valores digitados no campos por meio do método 'POST'
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $nascimento = $_POST['nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $usuario = $_POST['usuario'];    
    $senha = $_POST['senha'];
    // abrindo a conexão com o banco
    $con = conectaMysql();
    // montando o comando 'insert' para realizar a gravação na tabela
    $sql = "insert into tab_usuario(nome_usuario,cpf_usuario,nasc_usuario,celular_usuario,email_usuario,cidade_usuario,uf_usuario,login_usuario,senha_usuario) values ('$nome','$cpf','$nascimento','$celular','$email','$cidade','$estado','$usuario','$senha');";
    // executando o comando 'insert'
    if (mysqli_query($con,$sql)) {
        //echo 'Usuário cadastrado com sucesso!';
        $_SESSION['usuario'] = $usuario;
        $_SESSION['senha'] = $senha;
    }
    else {
        echo 'Erro ao registrar o usuário!';
        header('location: ./index.php');
    }
?>