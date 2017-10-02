<?php

function recaptcha()
{

	global $recaptcha_response, $recaptcha_SECRET_KEY;





// Os parâmetros ficam em um array

$parametros = array (
    "secret" => "$recaptcha_SECRET_KEY",
    "response" => "$recaptcha_response",
    "remoteip" => $_SERVER["REMOTE_ADDR"]
);


// Abre conexão via curl, e informo os parametros
$curlReCaptcha = curl_init();
curl_setopt($curlReCaptcha, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($curlReCaptcha, CURLOPT_POST, true);
curl_setopt($curlReCaptcha, CURLOPT_POSTFIELDS, http_build_query($parametros));
curl_setopt($curlReCaptcha, CURLOPT_RETURNTRANSFER, true);

// "decodando" o 'json' para um array php
$resposta = json_decode(curl_exec($curlReCaptcha), true);

curl_close($curlReCaptcha);


// nao interessando muito o que tenha ali, imprimo o resultado para a variável


sprintf("$resposta");


}




?>