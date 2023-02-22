<?php

namespace Bling;

use Bling\Core\BlingController;
use Bling\Exceptions\BlingException;
use Exception;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

class Pedido extends BlingController{
       
    public function listar(array $filters = [], $historicoOcorrencias = 'true', $page = 1){
        $query = [
            'apikey' => $this->token,
            'historico' => $historicoOcorrencias
        ];
        
        if(!empty($filters)){
            $query['filters'] = $this->processFilters($filters);
        }
        
        try{
            $response = $this->http->get(sprintf('pedidos/%s/%s/', 'page='.$page, $this->responseFormat), array(
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
    
    public function atualizar($numero, array $data){
        $postData = [
            'apikey' => $this->token,
            'xml' => ArrayToXml::convert($data, [
                'rootElementName' => 'pedido',
            ])  
        ];
        
        try{
            $response = $this->http->put(sprintf('pedido/%s/%s', $numero, $this->responseFormat), array(
                GuzzleHttp\RequestOptions::FORM_PARAMS => $postData,
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
    
    public function inserir(array $data){
        $postData = [
            'apikey' => $this->token,
            'xml' => ArrayToXml::convert($data, [
                'rootElementName' => 'pedido',
            ])  
        ];
        
        try{
            $response = $this->http->post(sprintf('pedido/%s', $this->responseFormat), array(
                GuzzleHttp\RequestOptions::FORM_PARAMS => $postData,
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
    
    public function detalhes($numero){
        $query = [
            'apikey' => $this->token
        ];
        
        try{
            $response = $this->http->get(sprintf('pedido/%s/%s/', $numero, $this->responseFormat), array(
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
