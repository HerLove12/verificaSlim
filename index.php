<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require_once 'controllers/SiteController.php';
require_once 'controllers/ImpiantoController.php';


$app = AppFactory::create();

$app->get('/','SiteController:index');
$app->get('/impianto','ImpiantoController:index');
$app->get('/dispositivi_di_allarme','ImpiantoController:dispositiviAllarme');
$app->get('/dispositivi_di_allarme/{id}','ImpiantoController:dispositiviAllarmeById');

$app->get('/rilevatori_di_pressione','ImpiantoController:rilevatoriDiPressione');
$app->get('/rilevatori_di_pressione/{id}/misurazioni','ImpiantoController:rilevatoriDiPressioneByIdM');
$app->get('/rilevatori_di_pressione/{id}/misurazioni/maggiore_di/{val}','ImpiantoController:rilevatoriDiPressioneByIdMM');

$app->get('/rilevatori_di_umidita','ImpiantoController:rilevatoriDiUmidita');
$app->get('/rilevatori_di_umidita/{id}/misurazioni','ImpiantoController:rilevatoriDiUmiditaByIdM');
$app->get('/rilevatori_di_umidita/{id}/misurazioni/maggiore_di/{val}','ImpiantoController:rilevatoriDiUmiditaByIdMM');

$app->run();