<?php

/* Preparação do conteúdo
 * (costumo ter uma função a realizar esta tarefa)
 */
$html = '
<p>O meu HTML como quero ver no navegador!</p>
<p>Já formatado e com CSS.</p>';


/* Preparação do documento final
 */
$documentTemplate = '
<!doctype html> 
<html> 
    <head>
        <link rel="stylesheet" media="screen" href="http://www.site.com/css/style.css" type="text/css">
    </head> 
    <body>
        <div id="wrapper">
            '.$html.'
        </div>
    </body> 
</html>';


// inclusão da biblioteca
require_once("dompdf/dompdf_config.inc.php");


// alguns ajustes devido a variações de servidor para servidor
if ( get_magic_quotes_gpc() )
    $documentTemplate = stripslashes($documentTemplate);


// abertura de novo documento
$dompdf = new DOMPDF();

// carregar o HTML
$dompdf->load_html($documentTemplate);

// dados do documento destino
$dompdf->set_paper("A4", "portrail");

// gerar documento destino
$dompdf->render();

// enviar documento destino para download
$dompdf->stream("dompdf_out.pdf");

exit(0);
?>