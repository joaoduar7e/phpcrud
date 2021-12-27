<?php
include_once '../includes/header.php';
require_once '../php_action/db_connect.php';

$sql = "SELECT * FROM marca";
$resultado = mysqli_query($connect, $sql);
?>

<div class="row">
    <div class="col">

        <!-- action no qual o formaluario para processar as informações --->
        <form class="espacamento" action="../php_action/create-carro.php" method="POST">

            <h3 class="font-weight-light"> Novo carro</h3>

            <div class="form-group">
                <input class="form-control" type="text" name="nome" id="nome" require="true" placeholder="Nome">
            </div>


            <div class="row">
                <div class="col">
                    <select class="form-control form-control" name="marca">
                        <?php while ($dados = mysqli_fetch_assoc($resultado)) :; ?>
                            <option value="<?php echo $dados['nome']; ?>"> <?php echo $dados['nome'] ?> </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="col col-lg-2">
                        <a href="../marca/adicionar.php" target="_blank" class="btn btn-success">
                        <i class="fa fa-plus-square"></i>
                        </a>
                </div>

            </div>


            <div class="form-group">
                <br>
                <input class="form-control" minlength="4" maxlength="4" type="number" name="ano" id="ano" placeholder="Ano">
            </div>


            <div style="text-align: right;">
                <button type="submit" name="btn-cadastrar" class="btn btn-outline-success pequeno"> Cadastrar </button>
                <a href="lista.php" class="btn btn-outline-info pequeno"> Lista de Carros</a>
            </div>


        </form>
    </div>
</div>