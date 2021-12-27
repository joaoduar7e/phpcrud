<?php


use Dompdf\Dompdf;

//Conexão banco de dados
include_once '../php_action/db_connect.php';
$html = "";

$sql = "SELECT * FROM marca ORDER BY nome ASC ";
$resultado = mysqli_query($connect, $sql);
while ($marcas = mysqli_fetch_assoc($resultado)): 

    $html .= "ID: ".$marcas['id']."<br>";
    $html .= "Nome: ".$marcas['nome']." <hr>";

endwhile;

require_once '../dompdf/autoload.inc.php';

//Instanciar a classe dompdf
$dompdf = new Dompdf();

$dompdf->loadHtml('

    <h1> Relatório de Marcas </h1>

        '. $html .'

');


//Renderizar o HTMl
$dompdf->render();

//Gerar saida do documento pdf
$dompdf->stream(
    "relatorio-marcas.pdf", //nome do arquivo pdf gerado
    array(
        "Attachment"=>false
    )
);

?>

