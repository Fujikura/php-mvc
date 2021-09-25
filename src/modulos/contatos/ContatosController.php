<?php 

namespace App\Modulos\Contatos;

use App\Modulos\Controller;
use App\Core\Response;

class ContatosController extends Controller
{
    public function index()
    {
        Response::setStatusCode(200);
        
        $data = [
            "titulo" => "Contatos",
            "conteudo" => "Conteudo"
        ];

        return $this->json($data);
    }
}

