<?php
/**
 * Created by PhpStorm.
 * User: RDuuke
 * Date: 03/11/2015
 * Time: 08:07 PM
 */
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

$app = new Slim\App();

$app->get('/users', '\RDuuke\Mdn\Controllers\UsersController:index');
$app->post('/users', '\RDuuke\Mdn\Controllers\UsersController:store');
$app->get('/users/{id}', '\RDuuke\Mdn\Controllers\UsersController:show');
$app->put('/users/{id}', '\RDuuke\Mdn\Controllers\UsersController:update');
$app->delete('/users/{id}', '\RDuuke\Mdn\Controllers\UsersController:destroy');
//$app->get('/users/', '\RDuuke\Mdn\Controllers\HomeController:index');
//$app->get('/users/', '\RDuuke\Mdn\Controllers\HomeController:index');
   /* $model = new \RDuuke\Mdn\Users();
    $result = $model->all();
    //$newResponse = $response->withHeader('Content-type', 'application/json')->withStatus(200);
    return $result;

});*/
$app->group('/users/{id:[0-9]+}', function () {
   $this->map(['GET', 'DELETE', 'POST', 'PUT'], '', function ($resquest, $response, $args){
       $response->write("Id: " . $args['id']);
       return $response;
   })->setName('user');
});
$app->run();