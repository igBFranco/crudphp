<?php
    /**
     * realizando o processo para salvar os dados na primeira tabela (tab_emprestimos)
     */
    // importando o arquivo de conexão com o banco de dados
    require_once('../config.php');
    require_once(DBAPI);
    // obtendo os valores dos campos
    $usuario = $_POST['usuario'];
    $data = $_POST['data'];
    // criando uma variável global para receber o id do empréstimo que vai ser salvo na tabela
    global $lastInsertId;
    // efetuando a conexão com o banco de dados
    $con = conectaMysql();
    // montando o comando 'insert'
    $sql = "insert into tab_emprestimos(usuario,data_emprestimo) values ('$usuario','$data');";
    // executando o comando 'insert'
    if (mysqli_query($con,$sql)) {
        // alimentando a variável com o último 'id' inserido
        $lastInsertId = $con->insert_id;         
        //header('Location: ../home.php');
    }
    else {
        echo 'Erro ao cadastrar o emprestimo!';
    }

    /**
     * realizando o processo para salvar os dados na segunda tabela (tab_livrosemprestimo)
     */
    $connect = new PDO("mysql:host=localhost:3306;dbname=db_biblioteca_2021_1", "root", "i58888955F");

    $sqlDetalhesEmprestimo = "insert into tab_livrosemprestimo (emprestimo,livro,data_devolucao) values (:emprestimo,:idLivro,:devolucao);";
    for($count = 0; $count<count($_POST['hidden_idLivro']); $count++) {
        $data = array(
            ':emprestimo' => $lastInsertId,
            ':idLivro' => $_POST['hidden_idLivro'][$count],
            ':devolucao' => $_POST['hidden_devolucao'][$count]
        );
        $statement = $connect->prepare($sqlDetalhesEmprestimo);
        // $statement = $connect->prepare($query);
        $statement->execute($data);
        // $statement->execute($data);
    }
?>