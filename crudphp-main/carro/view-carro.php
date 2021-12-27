<?php
//Conexão banco
include_once '../php_action/db_connect.php';

include_once '../includes/header.php';

if (isset($_GET['id'])) :
    $id = mysqli_escape_string($connect, $_GET['id']);
    $sql = "SELECT * FROM carro where id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);

    $sql_marca = "SELECT * FROM marca";
    $resultado_marca = mysqli_query($connect, $sql_marca);
endif;

?>


<div class="row">
    <div class="col">

        <!-- action no qual o formaluario para processar as informações -->
        <form class="espacamento" action="../php_action/update-carro.php" method="POST">
            <h3 class="font-weight-light"> Visualizar Carro</h3>

            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">

            <div class="form-group">
                <label class="col-sm-2 col-form-label"> ID: </label>
                <input disabled="true" class="form-group" type="text" value="<?php echo $dados['id']; ?>">
                <br />

                <label for="nome" class="col-sm-2 col-form-label"> NOME: </label>
                <input disabled="true" class="form-group" type="text" id="nome" value="<?php echo $dados['nome']; ?>">
                <br />

                <label class="col-sm-2 col-form-label"> MARCA: </label>
                <input disabled="true" class="form-group" type="text" value="<?php echo $dados['marca']; ?>">
                <br />

                <label class="col-sm-2 col-form-label"> ANO: </label>
                <input disabled="true" class="form-group" type="text" name="ano" id="ano" value="<?php echo $dados['ano']; ?>">
            </div>

            <div style="text-align: right;">
                <a href="lista.php" class="btn btn-outline-info pequeno"> Lista de Carros</a>
            </div>
        </form>
    </div>
</div>