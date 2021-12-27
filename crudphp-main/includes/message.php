<?php
//Sessão
session_start();
//verifica se existe a mensagem ao cadastrar
if (isset($_SESSION['mensagem'])) : ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert" style="position: relative;">
    <!--Pega a a mensagem que foi fornecida e mostra em tela -->
    <strong> <?php echo $_SESSION['mensagem']; ?> </strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php
endif;

//Após exibir mensagem e  atualizar a pagina a mensagem irá sumir
session_unset();

?>