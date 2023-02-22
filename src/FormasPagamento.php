<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Bling;

use Bling\Core\BlingController;
use Bling\Exceptions\BlingException;
use Exception;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

/**
 * Description of FormasPagamento
 *
 * @author weslley
 */
class FormasPagamento extends BlingController{
    
    public function listar(array $filters = [], $page = 1){
        $query = [
            'apikey' => $this->token
        ];
        
        if(!empty($filters)){
            $query['filters'] = $this->processFilters($filters);
        }
        
        try{
            $response = $this->http->get(sprintf('formaspagamento/%s/%s/', 'page='.$page, $this->responseFormat), array(
                "query" => $query,
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
            
        } catch (ServerException $ex) {
            
            throw BlingException::fromObjectMessage('[ServerException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
                        
        } catch (ClientException $ex) {
            
            throw BlingException::fromObjectMessage('[ClientException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
            
        } catch (BadResponseException $ex) {
            
            throw BlingException::fromObjectMessage('[BadResponseException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
            
        } catch (Exception $ex) {
            throw new BlingException($ex);
        }
    }
}
