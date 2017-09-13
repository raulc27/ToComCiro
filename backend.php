<?php
/*

Testo as variáveis, estando com conteúdo, vou chamando as funções que irão executar as tarefas


*/

//as variáveis que o sistema irá trabalhar

   $nome=$_REQUEST['nome'];
   $cep=$_REQUEST['cep'];
   $email=$_REQUEST['email'];
   $DDD=$_REQUEST['DDD'];
   $telefone=$_REQUEST['telefone'];

   $recaptcha_response=$_POST['g-recaptcha-response'];

   
//array da imagem/upload
    $name = $_FILES["arquivo"]["name"];
    $type = $_FILES["arquivo"]["type"];
    $size = $_FILES["arquivo"]["size"];
    $temp = $_FILES["arquivo"]["tmp_name"];
    $error = $_FILES["arquivo"]["error"];
 
if(!empty($nome) || !empty($cep) || !empty($email) || !empty($telefone) || !empty($name))
{
		
		include("funcoes/constantes.php"); 	//api_keys, secrets etc, elas vem aqui nesse arquivo
		include("funcoes/recaptcha.php"); 	//para trabalhar o recaptcha
		include("funcoes/checaVar.php"); 	// checo as variáveis etc, realizo ajustes
		include("funcoes/uuid.php");     	// "monto" um UUID
		include("funcoes/fazPostagem.php"); // faço a postagem no REST...
		include("funcoes/backBlaze.php");   // faço a postagem da foto no backBLAZE
		
		/*

            checaVar fará as checagens padrão (tamanho da imagem, etc etc)

		*/


		$checaVariaveis=checaVar();

		$checaVariaveis="Ok" ? $Postagem=fazPostagem():$respostaFinal="0";

		$recaptcha=recaptcha();

		$UUID=uuid();
		
		$Postagem="200" ? $postaBackBlaze=backBlaze():$respostaFinal="0";

		$postaBackBlaze="200" ? $respostaFinal=$postaBackBlaze:$respostaFinal="0";
		
			

				


		
		
		      echo "$respostaFinal"; 

}

else
{

	echo "0";


}

?>

