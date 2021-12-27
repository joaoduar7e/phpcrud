
<?php
//Inicia a Sessão
session_start();
//Chama a conexão
require 'db_connect.php';

//Verifica se o botão btn-deletar foi clicado
if(isset($_POST['btn-deletar'])):
    $id = mysqli_escape_string($connect, $_POST['id']);

    $sql = "DELETE FROM marca WHERE id = '$id'";

    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Excluido com sucesso!";
        header('Location: ../marca/lista.php');
    else:
        $_SESSION['mensagem'] = "Erro ao excluir!";
        header('Location: ../marca/lista.php');
       
    endif;

endif;