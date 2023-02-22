<?php

date_default_timezone_set('America/Sao_Paulo');
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . "/../vendor/autoload.php";

use Spatie\ArrayToXml\ArrayToXml;

$apiKey = '-';

$api = new Bling\FormasPagamento();

$api->setToken($apiKey);

try{
    
    $products = $api->listar();
    
    \Bling\Helper\BlingHelper::dump($products);
    
} catch (\Exception $ex) {
    
    \Bling\Helper\BlingHelper::dump($ex);
    
}

//$api = new Bling\Situacao();
//
//$api->setToken($apiKey);
//
//try{
//    
//    $products = $api->listar(Bling\Situacao::MODULO_VENDAS);
//    
//    \Bling\Helper\BlingHelper::dump($products);
//    
//} catch (\Exception $ex) {
//    
//    \Bling\Helper\BlingHelper::dump($ex);
//    
//}

//$api = new Bling\Pedido();
//
//$api->setToken($apiKey);
//
//try{
//    
//    $products = $api->listar();
//    
//    \Bling\Helper\BlingHelper::dump($products);
//    
//} catch (\Exception $ex) {
//    
//    \Bling\Helper\BlingHelper::dump($ex);
//    
//}

//$api = new Bling\Pedido();
//
//$api->setToken($apiKey);
//
//try{
//    
//    $products = $api->detalhes(1);
//    
//    \Bling\Helper\BlingHelper::dump($products);
//    
//} catch (\Exception $ex) {
//    
//    \Bling\Helper\BlingHelper::dump($ex);
//    
//}

//$apiBlingCategoria = new Bling\Categoria();
//
//$apiBlingCategoria->setToken($apiKey);
//
//try{
//    
//    $categories = $apiBlingCategoria->listar();
//    
//    \Bling\Helper\BlingHelper::dump($categories);
//    
//} catch (\Exception $ex) {
//    
//    \Bling\Helper\BlingHelper::dump($ex);
//    
//}

//$apiBlingProduto = new Bling\Produto();
//
//$apiBlingProduto->setToken($apiKey);
//
//try{
//    
//    $products = $apiBlingProduto->detalhes(123123);
//    
//    \Bling\Helper\BlingHelper::dump($products);
//    
//} catch (\Exception $ex) {
//    
//    \Bling\Helper\BlingHelper::dump($ex);
//    
//}

//\Bling\Helper\BlingHelper::dump(
//    ArrayToXml::convert([
//        'data' => '99/99/9999',
//        'parcelas' => [
//            [
//                'parcela' => [
//                    'data' => 'asdasdasd',
//                    'vlr' => '1000',
//                ]
//            ]
//        ]
//    ], [
//        'rootElementName' => 'pedido',
//    ])    
//);