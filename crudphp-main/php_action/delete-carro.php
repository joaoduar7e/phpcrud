
<?php
//Inicia a Sessão
session_start();
//Chama a conexão
require 'db_connect.php';

//Verifica se o botão btn-deletar foi clicado
if(isset($_POST['btn-deletar'])):
    $id = mysqli_escape_string($connect, $_POST['id']);

    $sql = "DELETE FROM carro WHERE id = '$id'";

    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Excluido com sucesso!";
        header('Location: ../carro/lista.php');
    else:
        $_SESSION['mensagem'] = "Erro ao excluir!";
        header('Location: ../carro/lista.php');
       
    endif;

endif;