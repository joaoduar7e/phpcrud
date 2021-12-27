
<?php
//Inicia a Sessão
session_start();
//Chama a conexão
require 'db_connect.php';

if (isset($_POST['btn-editar'])) :
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $marca = mysqli_escape_string($connect, $_POST['marca']);
    $ano = mysqli_escape_string($connect, $_POST['ano']);

    $id = mysqli_escape_string($connect, $_POST['id']);

    $sql = "UPDATE carro SET nome = '$nome', marca = '$marca', ano = '$ano' WHERE id = '$id'";


    if (empty($nome)) :
        $_SESSION['mensagem'] = "O nome do carro não pode ser vazio!";
        header('Location: ../carro/adicionar.php');
    elseif (empty($marca)) :
        $_SESSION['mensagem'] = "É necessário selecionar uma marca!";
        header('Location: ../carro/adicionar.php');
    else :
        if (mysqli_query($connect, $sql)) :
            $_SESSION['mensagem'] = "Atualizado com sucesso!";
            header('Location: ../carro/lista.php');
        else :
            $_SESSION['mensagem'] = "Erro ao atualizar!";
            header('Location: ../carro/lista.php');
        endif;
    endif;
endif;
