<?php
    // iniciar a sessão
    session_start();
    // verificando se foram setadas as informações referentes a sessão
    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('location:/crudphp//index.php');
    }
    // para destruir uma sessao
    // session_destroy();
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/crudphp/css/bootstrap.min.css">
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Font Awesome - Icons & Fonts -->
    <script src="https://kit.fontawesome.com/35898f413d.js" crossorigin="anonymous"></script>
    
    <!-- Codificação CSS para posicionamento de header e footer -->
    <style type="text/css">

    </style>

    <title>Biblioteca Virtual - UnC 202/11 - Versão do Professor</title>
  </head>
  
  <body>

    <!-- definindo a área de cabeçalho da página -->
    <header>
        <nav class=" navbar navbar-expand-lg navbar-dark bg-primary">

            <a class="navbar-brand" href="#">
                <i class="fa fa-book-open"></i>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <!-- criando um botão Home -->
                    <li class="nav-item active">
                        <a class="nav-link" href="../home.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <!-- criando um menu dropdown para consultas-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Consultas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/crudphp/emprestimos/emprestimos.php">
                                <i class="fas fa-list-alt"></i>
                                Empréstimos
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/crudphp/autores/index.php">
                                <i class="fas fa-user-tie"></i>
                                Autores
                            </a>
                            <a class="dropdown-item" href="/crudphp/editoras/index.php">
                                <i class="fas fa-store-alt"></i>
                                Editoras
                            </a>
                            <a class="dropdown-item" href="/crudphp/livros/index.php">
                                <i class="fas fa-book"></i>    
                                Livros
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/crudphp/usuarios/index.php">
                                <i class="fas fa-user-friends"></i>
                                Usuários
                            </a>
                        </div>
                    </li>
                    <!-- criando um menu dropdown para cadastros -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cadastros
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/crudphp/autores/insere.php">
                                <i class="fas fa-user-tie"></i>
                                Autores
                            </a>
                            <a class="dropdown-item" href="/crudphp/editoras/insere.php">
                                <i class="fas fa-store-alt"></i>
                                Editoras
                            </a>
                            <a class="dropdown-item" href="/crudphp/livros/insere.php">
                                <i class="fas fa-book"></i>    
                                Livros
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/crudphp/usuarios/insere.php">
                                <i class="fas fa-user-friends"></i>
                                Usuários
                            </a>
                        </div>
                    </li>
                    <!-- criando um menu dropdown para movimentações -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Movimentações
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/crudphp/emprestimos/emprestimos.php">
                                <i class="fas fa-list-alt"></i>
                                Empréstimos
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/crudphp/autorias/autorias.php">
                                <i class="fas fa-users"></i>
                                Autorias
                            </a>
                        </div>
                    </li>
                    <!-- criando o link para sair -->
                    <li class="nav-item active">
                        <a class="nav-link" href="/crudphp/usuarios/logout.php">Sair</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">

        <!-- criando a área central -->
        <main class="container text-center">