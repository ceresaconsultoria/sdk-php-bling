<?php

date_default_timezone_set('America/Sao_Paulo');
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . "/../vendor/autoload.php";

$apiKey = '';

$apiBlingCategoria = new Bling\Categoria();

$apiBlingCategoria->setToken($apiKey);

try{
    
    $categories = $apiBlingCategoria->detalhes(123);
    
    \Bling\Helper\BlingHelper::dump($categories);
    
} catch (\Exception $ex) {
    
    \Bling\Helper\BlingHelper::dump($ex);
    
}

//$apiBlingProduto = new Bling\Produto();
//
//$apiBlingProduto->setToken($apiKey);
//
//try{
//    
//    $products = $apiBlingProduto->listar();
//    
//    \Bling\Helper\BlingHelper::dump($products);
//    
//} catch (\Exception $ex) {
//    
//    \Bling\Helper\BlingHelper::dump($ex);
//    
//}