<?php

namespace Bling;

use Bling\Core\BlingController;
use Bling\Exceptions\BlingException;
use Exception;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

class NotaFiscal extends BlingController{

    public function listar(array $filters = [], $page = 1){
        $query = [
            'apikey' => $this->token,
        ];
        
        if(!empty($filters)){
            $query['filters'] = $this->processFilters($filters);
        }
        
        try{
            $response = $this->http->get(sprintf('notasfiscais/%s/%s/', 'page='.$page, $this->responseFormat), array(
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
    
    public function detalhes($numero, $serie){
        $query = [
            'apikey' => $this->token
        ];
        
        try{
            $response = $this->http->get(sprintf('notafiscal/%s/%s/%s/', $numero, $serie, $this->responseFormat), array(
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
