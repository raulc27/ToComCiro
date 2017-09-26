

<?php

function checaVar()
{


    /* trabalhando com variáveis globais, modifica-se essas variáveis globais qdo necessário. 
    O resultado será postado sempre como 'Ok' no caso de sucesso, ou 'notOk' (not ok) no caso de insucesso */

    settype($resp,"string");

    global $name,$type,$size,$temp,$error;
    global $largura_imagem, $altura_imagem;

    $tamanho=getimagesize($temp);

   
    if(($type!="jpg") && ($tamanho[0]!=$largura_imagem) && ($tamanho[1]!=$altura_imagem))

    {
        $resp="Ok";
    }

    else
    {
        $resp="notOk";
    }


    sprintf("$resp");




}

?>
