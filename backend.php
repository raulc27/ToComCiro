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
   
//array da imagem/upload
    $name = $_FILES["arquivo"]["name"];
    $type = $_FILES["arquivo"]["type"];
    $size = $_FILES["arquivo"]["size"];
    $temp = $_FILES["arquivo"]["tmp_name"];
    $error = $_FILES["arquivo"]["error"];
 
if(!empty($nome) || !empty($cep) || !empty($email) || !empty($telefone) || !empty($name))
{
		
		include("funcoes/constantes.php");
		include("funcoes/checaVar.php");
		include("funcoes/uuid.php");
		include("funcoes/fazPostagem.php");
		include("funcoes/backBlaze.php");
		
		


		$checaVariaveis=checaVar(); //checa tamnho da imagem e faz todos os outros ajustes

		$UUID=uuid(); // gera UUID e armazena na variável $UUID..

		$checaVariaveis="Ok" ? $Postagem=fazPostagem():$respostaFinal="0"; //Faz postagem no restfull se $checaVariaveis estiver ok

				
		$Postagem="200" ? $postaBackBlaze=backBlaze():$respostaFinal="0"; //Se postagem no restfull foi Ok, então posta imagem no backBlaze

		$postaBackBlaze="200" ? $respostaFinal=$postaBackBlaze:$respostaFinal="0"; //Se postagem no backBlaze foi ok, retorna o resultado
		
			

				


		
		
		      echo "$respostaFinal"; 

}

else
{

	echo "0";


}

?>
