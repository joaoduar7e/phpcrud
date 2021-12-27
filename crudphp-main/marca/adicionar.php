<?php
include_once '../includes/header.php';
?>
<div class="row">
    <div class="col">

        <!-- action no qual o formaluario para processar as informações -->
        <form class="espacamento" action="../php_action/create-marca.php" method="POST">
            <h3 class="font-weight-light"> Nova marca</h3>

            <div class="form-group">
                <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome">
            </div>

            <div style="text-align: right;">
                <button type="submit" name="btn-cadastrar" class="btn btn-outline-success pequeno"> Cadastrar </button>
                <a href="lista.php" class="btn btn-outline-info pequeno"> Lista de Marcas</a>
            </div>
        </form>
    </div>
</div>