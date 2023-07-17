<?php

$reference_id = $_GET['reference_id'];
$secodary_key = $_GET['secodary_key'];
$access_token = $_GET['access_token'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sandbox.momodeveloper.mtn.com/collection/v1_0/requesttopay/" . $reference_id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer " . $access_token,
    "X-Target-Environment: sandbox",
    "Ocp-Apim-Subscription-Key: $secodary_key"
));
$response = curl_exec($ch);
curl_close($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
echo 'Paiement effectué ! Response status code is : ' . $httpcode;
header('Location: ../spends/spends.php?success=1');

?>

