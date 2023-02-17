<?php

namespace Bling;

use Bling\Core\BlingController;
use Bling\Exceptions\BlingException;
use Exception;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

class NotaFiscal extends BlingController{
       
    public function listar($produto, array $data){
        try{
            $response = $this->http->get(sprintf('preco/v1/nacional/%s', $produto), array(
                "headers" => [
                    "Authorization" => $this->getToken()->getToken(),
                ],
                "query" => $data,
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->msgs)){
                throw BlingException::fromObjectMessage($bodyDecoded->msgs, $ex->getCode(), $ex->getPrevious());
            }
            
            throw BlingException::fromObjectMessage('[ServerException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
                        
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->msgs)){
                throw BlingException::fromObjectMessage($bodyDecoded->msgs, $ex->getCode(), $ex->getPrevious());
            }
            
            throw BlingException::fromObjectMessage('[ClientException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->msgs)){
                
                throw BlingException::fromObjectMessage($bodyDecoded->msgs, $ex->getCode(), $ex->getPrevious());
                
            }
            
            throw BlingException::fromObjectMessage('[BadResponseException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
            
        } catch (Exception $ex) {
            throw new BlingException($ex);
        }
    }
    
}
