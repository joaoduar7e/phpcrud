
<?php
//Inicia a Sessão
session_start();
//Chama a conexão
require 'db_connect.php';

if (isset($_POST['btn-editar'])) :
    $nome = mysqli_escape_string($connect, $_POST['nome']);

    $id = mysqli_escape_string($connect, $_POST['id']);

    $sql = "UPDATE marca SET nome = '$nome' WHERE id = '$id'";

    if (empty($nome)) :
        $_SESSION['mensagem'] = "O nome da marca não pode ser vazio!";
        header('Location: ../marca/adicionar.php');
    else :
        if (mysqli_query($connect, $sql)) :
            $_SESSION['mensagem'] = "Atualizado com sucesso!";
            header('Location: ../marca/lista.php');
        else :
            $_SESSION['mensagem'] = "Erro ao atualizar!";
            header('Location: ../marca/lista.php');
        endif;
    endif;
endif;
