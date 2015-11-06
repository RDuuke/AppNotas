<?php
/**
 * Created by PhpStorm.
 * User: RDuuke
 * Date: 04/11/2015
 * Time: 07:49 PM
 */

namespace RDuuke\Mdn;



use RDuuke\Mdn\Core\Model;

class Users extends Model
{
    protected $table = "users";

    /**
     * @param $correo
     * @param $nombre
     * @param $edad
     */
    public function create($correo, $nombre, $edad){
        $sth = $this->con->prepare("INSERT INTO $this->table (correo, nombre, edad) VALUE (:correo, :nombre, :edad)", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
        if(! $sth->execute(array(":correo" => $correo, ":nombre" => $nombre, ":edad" => $edad))){
            return false;
        }
        return true;
    }

    /**
     * @param $id
     * @param $correo
     * @param $nombre
     * @param $edad
     */
    public function update($id, $correo, $nombre, $edad){
        $sth = $this->con->prepare("UPDATE $this->table SET correo = :correo, nombre = :nombre, edad = :edad WHERE id = :id");
        $sth->bindParam(":correo", $correo);
        $sth->bindParam(":nombre", $nombre);
        $sth->bindParam(":edad", $edad);
        $sth->bindParam(":id", $id);
        if(! $sth->execute()){
            return false;
        }
        return true;
    }

}