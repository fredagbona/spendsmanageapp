<?php
$reference_id = $_GET['reference_id'];
$secodary_key = $_GET['secodary_key'];
$access_token = $_GET['access_token'];
$amount = $_GET['amount'];
$tel = $_GET['tel'];


// Set the request URL
$url = "https://sandbox.momodeveloper.mtn.com/collection/v1_0/requesttopay";
// Set the headers
$headers = array(
    'Authorization: Bearer '.$access_token,
    'X-Reference-Id: '. $reference_id,
    'X-Target-Environment: sandbox',
    'Content-Type: application/json',
    'Ocp-Apim-Subscription-Key: '.$secodary_key
);

//GENRATE AN EXTERNAL ID 8 DIGITS
$external_id = rand(10000000, 99999999);

// Set the request body
$body = array(
    'amount' => $amount,
    'currency' => 'EUR',
    "externalId" => $external_id,
    'payer' => array(
        'partyIdType' => 'MSISDN',
        'partyId' => $tel
    ),
    'payerMessage' => 'Umeskia Softwares MTN Payment',
    'payeeNote' => 'Thank you for using Umeskia Softwares MTN Payment'
);
// Encode the request body as JSON
$json_body = json_encode($body);
// Initialize cURL
$curl = curl_init();
// Set the cURL options
curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_POSTFIELDS => $json_body
));
// Execute the cURL request
$response = curl_exec($curl);
// Check for errors
if(curl_errno($curl)) {
    $error_msg = curl_error($curl);
    echo "cURL Error: " . $error_msg;
}
// Close the cURL session
curl_close($curl);
// Output the response
// Check for errors
if (curl_errno($curl)) {
    $error_msg = curl_error($curl);
    echo "cURL Error: " . $error_msg;
} else {
    //Get http status code
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    // Close the cURL session
    curl_close($curl);
    // Output the response status
    if ($httpcode == 202) {
        header("location: requestpaystatus.php?reference_id=".$reference_id."&secodary_key=".$secodary_key."&access_token=".$access_token);
        exit; 
    } else {
        echo 'Request successfully, Response status code is : ' . $httpcode;
        echo "<br>";
        echo "Error : " . $response;
    }
}
?>
