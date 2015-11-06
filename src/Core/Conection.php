<?php

namespace RDuuke\Mdn\Core;


abstract class Conection
{
    protected $conn;

    public function __construct(){
        $this->con = new \PDO('mysql:dbname=appnota;host=127.0.0.1','root','');
    }
}