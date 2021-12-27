<?php

session_start();

require 'db_connect.php';

if (isset($_POST['btn-cadastrar'])) :

    $nome =  mysqli_escape_string($connect, $_POST['nome']);
    $sql = "INSERT INTO marca (nome) VALUES ('$nome')";

    if (empty($nome)) :
        $_SESSION['mensagem'] = "O nome da marca não pode ser vazio!";
        header('Location: ../marca/adicionar.php');
    else :

        if (mysqli_query($connect, $sql)) :
            $_SESSION['mensagem'] = "Cadastrado com sucesso!";
            header('Location: ../marca/lista.php');
        else :
            $_SESSION['mensagem'] = "Erro ao cadastrar!";
            header('Location: ../marca/lista.php');
        endif;
    endif;

elseif (isset($_POST['btn-cadastrarC'])) :
    $nome =  mysqli_escape_string($connect, $_POST['nome']);
    $sql = "INSERT INTO marca (nome) VALUES ('$nome')";

    if (empty($nome)) :
        $_SESSION['mensagem'] = "O nome da marca não pode ser vazio!";
    else :

        if (mysqli_query($connect, $sql)) :
            $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        else :
            $_SESSION['mensagem'] = "Erro ao cadastrar!";
        endif;
    endif;
endif;
