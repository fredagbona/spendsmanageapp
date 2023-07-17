<?php


function generate_uuid()
{
  return sprintf(
    '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff),
    mt_rand(0, 0x0fff) | 0x4000,
    mt_rand(0, 0x3fff) | 0x8000,
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff)
  );
}
$reference_id = generate_uuid();
    $secodary_key = '469c4a3c8eb04d308b3ecb4858224e16';
    $apikey = '660a61387e504de3ab77569a3906d69b';
    $amount = $POST['amount'];
    $tel = $_POST['number'];


$url = "https://sandbox.momodeveloper.mtn.com/collection/token/";
$headers = array(
    'Authorization: Basic '. base64_encode($reference_id.':'.$apikey),
    'Ocp-Apim-Subscription-Key: '. $secodary_key,
    'Content-Length: 0'
);
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => $headers
));
$response = curl_exec($curl);
if(curl_errno($curl)) {
    $error_msg = curl_error($curl);
    echo "cURL Error: " . $error_msg;
}else {
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($http_code === 200) {
        $data = json_decode($response);
        if ($data->access_token) {
            $access_token = $data->access_token;
            echo "Succès : Jeton d'accès généré avec succès";
            header("location: requestpay.php?reference_id=".$reference_id."&secodary_key=".$secodary_key."&access_token=".$access_token."&amount=".$amount."&tel=".$tel);
        } else {
            echo "Erreur : Impossible de générer le jeton d'accès";
        }
    } else {
        echo "Erreur HTTP : Code de réponse " . $http_code;
    }
}



