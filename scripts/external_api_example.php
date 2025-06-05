<?php
$url = 'https://api.dostawca.pl/products';
$token = 'TWÓJ_TOKEN'; // Zmień na swój token

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $token
]);
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);
print_r($data);
// Tutaj możesz dodać logikę importu do PrestaShop 