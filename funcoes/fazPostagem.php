<?php

function fazPostagem()
{
    global $nome,$telefone,$cep,$email,$UUID;

    $dados=array(
        "nome"=>$nome,
        "telefone"=>$telefone,
        "cep"=>$cep,
        "email"=>$email,
        "UUID"=>$UUID,
        "recaptcha"=>$recaptcha

    );

    $dados=http_build_query($dados);

	$postaREST=curl_init();
    
		    curl_setopt($postaREST,CURLOPT_URL,"$servREST");
		    curl_setopt($postaREST,CURLOPT_FOLLOWLOCATION,true);
		    curl_setopt($postaREST,CURLOPT_RETURNTRANSFER,true);
		    curl_setopt($postaREST,CURLOPT_FILETIME,true);
            curl_setopt($postaREST, CURLOPT_POST, true);
            curl_setopt($postaREST, CURLOPT_POSTFIELDS, $dados);

		    $postagem=curl_exec($postaREST);
            $curl_close($postagem);

            //$resposta=new SimpleXMLElement($postagem);
            //print_r(curl_getinfo($postaREST));

            $info=curl_getinfo($postaREST);
            $http=$info['http_code'];



            return $http;
            

    




}
?>