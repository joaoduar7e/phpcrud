<?php

//Conexão banco
include_once '../php_action/db_connect.php';

include_once '../includes/header.php';

//verifica se está sendo passado na url a pagina atual, se não é atribuido a pagina 1
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

//Selecionar as marcas a serem apresentados na pagina
$sql = "SELECT * FROM marca";

$resultado = mysqli_query($connect, $sql);


//Contador o total de marcas
$total_marca = mysqli_num_rows($resultado);

//Seta a quantidade de marcas por pagina
$quantidade = 3;

//Calcular o númerop de páginas necessarias para apresentar as marcas
$num_paginas = ceil($total_marca / $quantidade);

//Calcular o inicio da visualização
$inicio = ($quantidade * $pagina) - $quantidade;

//Marcas por pagina
$resultados = "SELECT * FROM marca ORDER BY nome ASC LIMIT $inicio, $quantidade";
$resultados_marca = mysqli_query($connect, $resultados);

$total_marca = mysqli_num_rows($resultados_marca);


?>

<div class="espacamento">
    <div class="row">

        <div class="col-sm-6">
            <h3 class="font-weight-light"> Marcas cadastradas</h3>
        </div>

        <div class="col-sm-4">
            <br />
        </div>


        <div class="col col-lg-2">
            <a href="adicionar.php" class="btn btn-info float-right"> Adicionar marca </a>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th></th>

            </tr>
        </thead>
        <tbody>

            <?php



            while ($dados = mysqli_fetch_assoc($resultados_marca)) :

            ?>
                <tr>

                    <td><?php echo $dados['nome']; ?></td>

                    <!-- passa o id vindo do banco de dados como paramentro -->
                    <td>
                        <a href="#modal<?php echo $dados['id']; ?>" class="float-right" data-toggle="modal" data-target="#modal<?php echo $dados['id']; ?>">
                            <i class="material-icons"> delete </i> </a>

                        <a href="editar-marca.php?id=<?php echo $dados['id']; ?>" class="float-right">
                            <i class="material-icons"> edit </i> </a>

                        <a href="view-marca.php?id=<?php echo $dados['id']; ?>" class="float-right">
                            <i class="material-icons"> info </i> </a>
                    </td>



                    <!-- Modal -->
                    <div class="modal fade" id="modal<?php echo $dados['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Opa!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Deseja realmente excluir a marca?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

                                    <form action="../php_action/delete-marca.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">

                                        <button type="submit" name="btn-deletar" class="btn btn-primary">Sim, desejo
                                            deletar</button>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
            <?php
            endwhile;

            // endif
            ?>

        </tbody>
    </table>
    <br>
</div>



<nav>
    <ul class="pagination justify-content-center">
        <?php

        //Apresentar a paginação
        for ($i = 1; $i < $num_paginas + 1; $i++) {
        ?>
            <li class="page-item"><a class="page-link" href="lista.php?pagina=<?php echo $i ?>"><?php echo $i ?></a></li>
        <?php }

        ?>
    </ul>
</nav>

<div class="text-center">
    <a href="../relatorios/rel_marca.php" target="_blank" class="btn btn-outline-info pequeno"> Gerar relatório de marcas </a>
</div>