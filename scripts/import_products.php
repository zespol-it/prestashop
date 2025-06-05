<?php
require_once(__DIR__.'/pswebservicelibrary.php');

$apiUrl = 'http://twojsklep.pl/api'; // Zmień na swój adres
$apiKey = 'TWÓJKLUCZAPI'; // Zmień na swój klucz API

try {
    $webService = new PrestaShopWebservice($apiUrl, $apiKey, false);
    $xml = $webService->get(['resource' => 'products?schema=blank']);
    $product = $xml->children()->children();

    $product->name->language[0][0] = 'Nowy produkt';
    $product->price = 99.99;
    $product->active = 1;
    // Dodaj inne wymagane pola

    $opt = [
        'resource' => 'products',
        'postXml' => $xml->asXML(),
    ];
    $xml = $webService->add($opt);
    echo "Produkt został dodany!\n";
} catch (Exception $e) {
    echo 'Błąd: '.$e->getMessage();
} 