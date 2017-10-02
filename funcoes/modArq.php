<?php


//modifica o nome da imagem para o UUID e mescla uma marca d'agua


function modArq()
{


    global $name, $temp, $UUID,$type,$size,$error;

    
        $novo_Nome=rename($temp,"temp/$UUID".".jpeg");

        $logoimg="img/logo.gif";

       $padding=10; 
       $opacidade=60;

       $logo=imagecreatefromgif("$logoimg");

       $imagem=imagecreatefromjpeg("temp/$UUID".".jpeg");

       $logo_size=getimagesize("$logoimg");

        $logo_width=$logo_size[0];
        $logo_height=$logo_size[1];

        $imagem_size=getimagesize("temp/$UUID".".jpeg");

       $dest_x = $imagem_size[0] - $logo_width - $padding;
       $dest_y = $imagem_size[1] - $logo_height - $padding;
        
       //imagecopymerge
      imagecopymerge($imagem, $logo, $dest_x, $dest_y, 0, 0, $logo_width, $logo_height, $opacidade);

       header("content-type: image/jpeg");
       //unlink("$novo_Nome");
       imagejpeg($imagem,"temp/$UUID".".jpeg");

              //imagejpeg($imagem);
              imagedestroy($imagem);
              imagedestroy($logo);




        sprintf("Ok");
}



?>
