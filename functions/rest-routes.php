<?php

add_action( 'rest_api_init', 'wp_form_endpoint' );
function wp_form_endpoint() {
  // full route: /wp-json/keep/v1/submit
  register_rest_route( 'keep/v1', 'submit', array(
    'methods' => 'POST',
    'callback' => 'submitForm',
  ));
}
function submitForm() {
  // check env and select correct endpoint
  $endpoint = (THEME_ENV === 'prod') ? 'https://api.frameworkhomeownership.org/partner/v1/lenders/borrowers/generation/authCode' : 'https://dev-api.frameworkhomeownership.org/partner/v1/lenders/borrowers/generation/authCode';
  // set up payload
  $payload = json_encode([
    'borrowerEmail' => $_POST['email'],
    'borrowerFirstName' => $_POST['first_name'],
    'borrowerLastName' => $_POST['last_name'],
    'partnerId' => '5ed8f160-2d7d-4abc-bec7-4b3bc0aa4171',
    'reCaptchaToken' => '$Rp&Z$*vFdAy'
  ]);


  // do curl request
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => $endpoint,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_HTTPHEADER => Array('Content-Type: application/json', 'Authorization: Bearer frameworkserviceaccount_coBlF6tCevejNQkXqta52fEqne8VfDGSSjdfUj25shhDBQ6THM1JC18qrfuJVhuY'),
    CURLOPT_POSTFIELDS => $payload
  ));

  $result = curl_exec($curl);

  curl_close($curl);


  return [
    'result' => json_decode($result),
    'submitted_payload' => json_decode($payload),
    'endpoint' => $endpoint,
    'env' => THEME_ENV,
    'http_host' => $_SERVER['HTTP_HOST']
  ];
}