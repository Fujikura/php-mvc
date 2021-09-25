<?php 

namespace App\Core;

class Request
{
    private string $httpMethod;
    private string $path;

    public function __construct()
    {
    }

    public function getHttpMethod()
    {
        $this->httpMethod = strtolower($_SERVER['REQUEST_METHOD']);
        return $this->httpMethod;
    }

    public function getPath()
    {
        $this->path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($this->path, '?');
        
        if($position === false){
            return $this->path;
        }
        $this->path = substr($this->path, 0, $position);
        return $this->path;
    }
}


