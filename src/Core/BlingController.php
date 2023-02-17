<?php

namespace Bling\Core;

class BlingController extends BlingHttp{
    protected $token;
    protected $responseFormat = 'json';
    
    const RESPONSE_JSON = 'json';
    const RESPONSE_JXML = 'xml';

    private $avalibleResponseFormats = ['json', 'xml'];

    public function __construct(array $config = []) {        
        parent::__construct($config);
    }
    
    public function getToken(){
        return $this->token;
    }

    public function setToken($token) {
        $this->token = $token;
        return $this;
    }
    
    public function getResponseFormat() {
        return $this->responseFormat;
    }

    public function setResponseFormat($responseFormat) {
        if(in_array($responseFormat, $this->avalibleResponseFormats)){
            $this->responseFormat = $responseFormat;
        }
        
        return $this;
    }
    
    protected function processFilters(array $filters = []){
        $filtersOut = [];
        
        foreach($filters as $key => $value){
            $filtersOut[] = $key.'['.$value.']';
        }
        
        return implode(";", $filtersOut);
    }
}
