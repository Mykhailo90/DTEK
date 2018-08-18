<?php

namespace aplication\lib;

use PDO;

Class ParentPath {

    public $arr = [];

    public function __construct() {
        $this->arr = $this->getArray();
    }

    private function getArray(){
        $obj = Registry::getInstance();
        $db = $obj->getProperty('DB');
        $prepare = $db->prepare('SELECT path_to_program FROM mod_programs');
        $prepare->execute();
        return $prepare->fetchAll(PDO::FETCH_COLUMN);
    }
}
