<?

/*

Esse código vem do próprio exemplo que está lá no backBlaze

Aqui embaixo eu apenas 'decodo' a resposta json para um array php. E então faço referência na outra função

Essa é parte para conseguir AUTORIZAÇÃO no backBlaze

*/

function backBlaze()
{

    $account_id = "3f058d94f9cd"; // Obtained from your B2 account page
    $application_key = "001c6985810a8fafef460617f399039fe8bf495ff1"; // Obtained from your B2 account page
    $credentials = base64_encode($account_id . ":" . $application_key);
    $url = "https://api.backblazeb2.com/b2api/v1/b2_authorize_account";
    
    $session = curl_init($url);
    
    // Add headers
    $headers = array();
    $headers[] = "Accept: application/json";
    $headers[] = "Authorization: Basic " . $credentials;
    curl_setopt($session, CURLOPT_HTTPHEADER, $headers);  // Add headers
    
    curl_setopt($session, CURLOPT_HTTPGET, true);  // HTTP GET
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true); // Receive server response
    $server_output = curl_exec($session);
    curl_close ($session);
    //echo ($server_output);

    $resposta=json_decode($server_output,true);




    $api_url = "$resposta['apiUrl']"; // From b2_authorize_account call
    $auth_token = "$resposta['authorizationToken']"; // From b2_authorize_account call
    $bucket_id = "939f6005c8ade9345fd90c1d";  // The ID of the bucket you want to upload to
    
    $session = curl_init($api_url .  "/b2api/v1/b2_get_upload_url");
    
    // Add post fields
    $data = array("bucketId" => $bucket_id);
    $post_fields = json_encode($data);
    curl_setopt($session, CURLOPT_POSTFIELDS, $post_fields); 
    
    // Add headers
    $headers = array();
    $headers[] = "Authorization: " . $auth_token;
    curl_setopt($session, CURLOPT_HTTPHEADER, $headers); 
    
    curl_setopt($session, CURLOPT_POST, true); // HTTP POST
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);  // Receive server response
    $server_output = curl_exec($session); // Let's do this!
    curl_close ($session); // Clean up
    //echo ($server_output); // Tell me about the rabbits, George!











    /* *********************************************************************************************

    ESSA PARTE É A PARTE DA 'POSTAGEM' DA IMAGEM NO BACKBLAZE 

    ****************************************************************************************************** */

        global $UUID, $name,$temp;



        $file_name = "$name";
        //$my_file = "$temp" . $file_name;
        $my_file = "$temp";
        $handle = fopen($my_file, 'r');
        $read_file = fread($handle,filesize($my_file));
        
        $upload_url = "$resposta['uploadUrl'];"; // Provided by b2_get_upload_url
        $upload_auth_token = ""; // Provided by b2_get_upload_url
        $bucket_id = "";  // The ID of the bucket
        $content_type = "text/plain";
        $sha1_of_file_data = sha1_file($my_file);
        
        $session = curl_init($upload_url);
        
        // Add read file as post field
        curl_setopt($session, CURLOPT_POSTFIELDS, $read_file); 
        
        // Add headers
        $headers = array();
        $headers[] = "Authorization: " . $upload_auth_token;
        $headers[] = "X-Bz-File-Name: " . $file_name;
        $headers[] = "Content-Type: " . $content_type;
        $headers[] = "X-Bz-Content-Sha1: " . $sha1_of_file_data;
        curl_setopt($session, CURLOPT_HTTPHEADER, $headers); 
        
        curl_setopt($session, CURLOPT_POST, true); // HTTP POST
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);  // Receive server response
        $server_output = curl_exec($session); // Let's do this!
        curl_close ($session); // Clean up
       // echo ($server_output); // Tell me about the rabbits, George!
    
    sprintf("200")/ //ehehe...



}
?>