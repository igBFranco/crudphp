<?php
    /**
     * realizando o processo para salvar os dados na primeira tabela (tab_autorias)
     */
    // importando o arquivo de conexão com o banco de dados
    require_once('../config.php');
    require_once(DBAPI);
    // obtendo os valores dos campos
    $livro = $_POST['livro'];
    $autor = $_POST['autor'];
    // criando uma variável global para receber o id do empréstimo que vai ser salvo na tabela
    global $lastInsertId;
    // efetuando a conexão com o banco de dados
    $con = conectaMysql();
    // montando o comando 'insert'
    $sql = "insert into tab_autorias(livro,autor) values ('$livro','$autor');";
    // executando o comando 'insert'
    if (mysqli_query($con,$sql)) {
        // alimentando a variável com o último 'id' inserido
        $lastInsertId = $con->insert_id;         
        //header('Location: ../home.php');
    }
    else {
        echo 'Erro ao cadastrar o autoria!';
    }


?>