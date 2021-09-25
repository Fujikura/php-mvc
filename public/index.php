<?php

require_once __DIR__ . "/../vendor/autoload.php";

use App\Core\Application;
use App\Database\CheckaEstruturas;
use App\Modulos\Home\HomeController;
use App\Modulos\Contatos\ContatosController;
use App\Database\Exceptions\DatabaseException;

$app = new Application();
try {

    $checkaEstruturas = new CheckaEstruturas();
    $checkaEstruturas->criarTabelas();

} catch (DatabaseException $e) {
    echo $e->getMessage();
}

$app->router->get('/', [HomeController::class, 'index']);

$app->router->get('/contatos', [ContatosController::class, 'index']);




$app->run();
