<?php

// $html = file_get_contents("https://webscraper.io/test-sites/e-commerce/allinone");
// $e_commerce = new DOMDocument();
// libxml_use_internal_errors(true);

// if (!empty($html)) {
//     $e_commerce->loadHTML($html);

//     libxml_clear_errors();
//     $e_commerce_path = new DOMXPath($e_commerce);

//     $query ='//a[@class = "title"]';
//     $result = $e_commerce_path->query($query);

//     $scraped_data = [];
//     if ($result->length > 0) {
//         foreach ($result as $item) {
//             $scraped_data[] = $item->nodeValue;
//         }
//     }
//     file_put_contents("file.json", json_encode($scraped_data));
//     echo "Les données ont été extraites avec succès et enregistrées dans file.json.\n";
//     // var_dump($scraped_data);
// }

$html = readline('Entrez l\'URL à scraper : '); // Demande à l'utilisateur de saisir l'URL

// Vérifie si l'URL est valide en utilisant une expression régulière
if (filter_var($html, FILTER_VALIDATE_URL) === false) {
    echo "L'URL saisie n'est pas valide.\n";
    exit;
}

$html = file_get_contents($html); // Récupère le contenu de l'URL spécifiée

$e_commerce = new DOMDocument();
libxml_use_internal_errors(true);

if (!empty($html)) {
    $e_commerce->loadHTML($html);

    libxml_clear_errors();
    $e_commerce_path = new DOMXPath($e_commerce);

    $query ='//a[@class = "title"]';
    $result = $e_commerce_path->query($query);

    $scraped_data = [];
    if ($result->length > 0) {
        foreach ($result as $item) {
            $scraped_data[] = $item->nodeValue;
        }
    }
    file_put_contents("file.json", json_encode($scraped_data));
    // var_dump($scraped_data);
    echo "Les données ont été extraites avec succès et enregistrées dans file.json.\n";
}