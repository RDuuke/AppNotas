<?php
/**
 * Created by PhpStorm.
 * User: RDuuke
 * Date: 03/11/2015
 * Time: 09:43 PM
 */

namespace RDuuke\Mdn\Core;
use RDuuke\Mdn\Core\Conection;

abstract class Model extends Conection
{
    public $result;
    protected $table;

    /**
     * @return array|string
     */
    public function all(){
        $datas = $this->con->query("SELECT * FROM $this->table");
        while($data = $datas->fetchAll(\PDO::FETCH_OBJ)){
            $result = $data;
        }
        header("Content-Type: application/json");
        $result = json_encode($result);
        return $result;
    }

    /**
     * @param $id
     * @return json
     */
    public function find($id){
        $data = $this->con->query("SELECT * FROM $this->table WHERE id = $id");
        if($data->rowCount() == 0){
            return false;
        }
        $result = $data->fetchAll(\PDO::FETCH_ASSOC);
        $result = current($result);
        header("Content-Type: application/json");
        $result = json_encode($result);
        return $result;
    }

    /**
     * @param $id
     */
    public function destroy($id){
        $sth = $this->con->prepare("DELETE FROM $this->table WHERE id = :id");
        $sth->bindParam(":id", $id);
        if(!$sth->execute()){
            return false;
        }
        return true;
    }

}