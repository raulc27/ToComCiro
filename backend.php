<?php
/*

Testo as variáveis, estando com conteúdo, vou chamando as funções que irão executar as tarefas


*/

//as variáveis que o sistema irá trabalhar

   $nome=$_POST['nome'];
   $cep=$_POST['cep'];
   $email=$_POST['email'];
   $ddd=$_POST['ddd'];
   $telefone=$_POST['telefone'];

  // $recaptcha_response=$_POST['g-recaptcha-response'];

   
//array da imagem/upload
   $name = $_FILES["arquivo"]["name"];
    $type = $_FILES["arquivo"]["type"];
    $size = $_FILES["arquivo"]["size"];
    $temp = $_FILES["arquivo"]["tmp_name"];
    $error = $_FILES["arquivo"]["error"];
 

	/* 'name' é o nome do arquivo de imagem e 'nome' é o nome do usuario */


if(!empty($nome) and !empty($cep) and !empty($email) and !empty($telefone) and !empty($temp) )
{
		
		include("funcoes/constantes.php"); 	//api_keys, secrets etc, elas vem aqui nesse arquivo
		include("funcoes/recaptcha.php"); 	//para trabalhar o recaptcha
		include("funcoes/checaVar.php"); 	// checo as variáveis etc, realizo ajustes
		include("funcoes/uuid.php");     	// "monto" um UUID
		include("funcoes/fazPostagem.php"); // faço a postagem no REST...
		include("funcoes/modArq.php"); //faz mods na imagem
		//include("funcoes/backBlaze.php");   // faço a postagem da foto no backBLAZE
		include("funcoes/picasa.php"); //botei o nome de picasa... 
		
		/*

            checaVar fará as checagens padrão (tamanho da imagem, etc etc)

		*/


		$checaVar=checaVar();


		$recaptcha=recaptcha();

		$UUID=uuid();


		

		$checaVar="Ok" ? $modArq=modArq():$respostaFinal="0";

		picasa();

		//backBlaze();

		//$modArq="Ok" ? $Postagem=fazPostagem():$respostaFinal="0";
		//$Postagem="200" ? $postaBackBlaze=backBlaze():$respostaFinal="0";

		//$postaBackBlaze="200" ? $respostaFinal=$postaBackBlaze:$respostaFinal="0";
		
			

				

			
		
			
		      echo "1"; 

}

else
{

	echo "0";


}

?>

