<?php
//Conexão banco
include_once '../php_action/db_connect.php';

include_once '../includes/header.php';

if (isset($_GET['id'])) :

    $id = mysqli_escape_string($connect, $_GET['id']);
    $sql = "SELECT * FROM marca where id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;

?>

<div class="row">
    <div class="col">
        <!-- action no qual o formaluario para processar as informações -->
        <form class="espacamento" action="../php_action/update-marca.php" method="POST">
            <h3 class="font-weight-light"> Visualizar marca</h3>

            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">

            <div class="form-group">

                <label for="nome" class="col-sm-2 col-form-label"> ID: </label>
                <input disabled="true" class="form-group" type="text" name="nome" id="nome" value="<?php echo $dados['id']; ?>" placeholder="Nome">

                <br />
                <label class="col-sm-2 col-form-label" > Nome: </label>
                <input disabled="true" class="form-group" type="text" name="nome" id="nome" value="<?php echo $dados['nome']; ?>" placeholder="Nome">

            </div>

            <div style="text-align: right;">
                <a href="lista.php" class="btn btn-outline-info pequeno"> Lista de Marcas</a>
            </div>


        </form>
    </div>
</div>