<?php 

namespace App\Core;

class Application
{
    public Router $router;
    private Request $request;
    private Response $response;

    public function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run()
    {
        $this->router->resolve();
    }

}   

