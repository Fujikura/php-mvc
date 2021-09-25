<?php 

namespace App\Core;

use App\Core\Request;

class Router
{
    protected array $routes = [];
    private Request $request;
    private Response $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }


    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getHttpMethod();
        $callback = $this->routes[$method][$path] ?? false ;

        if($callback === false){
            echo "Not found";
            exit;
        }

        if(is_array($callback)){
            $callback[0] = new $callback[0]();
        }

        return call_user_func($callback);
    }
}

