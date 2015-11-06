<?php
/**
 * Created by PhpStorm.
 * User: RDuuke
 * Date: 03/11/2015
 * Time: 11:20 PM
 */

namespace RDuuke\Mdn\Controllers;

use RDuuke\Mdn\Core\Controller;
use RDuuke\Mdn\Users;

class UsersController implements Controller
{
    protected $users;

    /**
     *
     */
    public function __construct(){
        /** @var TYPE_NAME $this */
        $this->users = new Users;
    }

    /**
     * @return array|string
     */
    public function index(){
        return $this->users->all();
    }

    /**
     * @param $resquest
     * @param $response
     * @param $args
     * @return json
     */
    public function show($resquest, $response, $args){
        $user = $this->users->find($args['id']);
        if(!$user){
            return json_encode(['find' => false, 'errors' => 'no user was found with that id']);
        }
        return $user;
    }

    /**
     * @param $resquest
     * @param $response
     * @param $args
     * @return array
     */
    public function store($resquest, $response, $args){
        $parmeters = $resquest->getParsedBody();
        if(!isset($parmeters['correo'])){
            return json_encode(['creared' => false, 'errors' => 'Requerid Correo']);
        }
        if(!isset($parmeters['nombre'])){
            return json_encode(['creared' => false, 'errors' => 'Requerid Nombre']);
        }
        if(!isset($parmeters['edad'])){
            return json_encode(['creared' => false, 'errors' => 'Requerid Edad']);
        }

        if($this->users->create($parmeters['correo'], $parmeters['nombre'], $parmeters['edad'])){
            $response->withHeader('Content-type', 'application/json');
            return json_encode(['created' => true]);
        }
        return json_encode(['created' => false]);
    }

    /**
     * @param $resquest
     * @param $response
     * @param $args
     * @return array
     */
    public function update($resquest, $response, $args){
        $parmeters = $resquest->getParsedBody();
        if(!isset($parmeters['correo'])){
            return json_encode(['creared' => false, 'errors' => 'Requerid Correo']);
        }
        if(!isset($parmeters['nombre'])){
            return json_encode(['creared' => false, 'errors' => 'Requerid Nombre']);
        }
        if(!isset($parmeters['edad'])){
            return json_encode(['creared' => false, 'errors' => 'Requerid Edad']);
        }
        if($this->users->update($args['id'],$parmeters['correo'], $parmeters['nombre'], $parmeters['edad'])){
            return json_encode(['update' => true]);
        }
        return json_encode(['update' => false]);
    }

    /**
     * @param $resquest
     * @param $response
     * @param $args
     * @return array
     */
    public function destroy($resquest, $response, $args){
        if($this->users->destroy($args['id'])){
            return json_encode(['destroy' => true]);
        }
        return json_encode(['destroy' => false]);

    }
}