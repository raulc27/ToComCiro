<?php


//modifica o nome da imagem para o UUID e mescla uma marca d'agua


function modArq()
{


    global $name, $temp, $UUID,$type,$size,$error;

    rename($name,"$UUID"."jpg");


        $logoimg="https://cadastro.todoscomciro.com/assets/img/logo.png";

        $padding=10; 
        $opacity=80;

        $logo=imagecreatefrompng("$logoimg");

        $imagem=imagecreatefromjpg("$temp");

        $logo_size=getimagesize("$logoimg");

        $logo_width=$logo_size[0];
        $logo_heigth=$logo_size[1];

        $imagem_size=getimagesize("$temp");

        $dest_x = $imagem_size[0] - $logo_width - $padding;
        $dest_y = $imagem_size[1] - $logo_height - $padding;
        
        imagecopymerge($imagem, $logo, $dest_x, $dest_y, 0, 0, $logo_width, $logo_height, $opacidade);

        $temp=$imagem;

        sprintf("Ok");
}



?>
