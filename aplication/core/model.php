<?php
  namespace aplication\core;

  abstract class Model {
    public $params;
    public function __construct($params){
      $this->params=$params;
    }
	   abstract public function get_data($arg = '');
     public function get_final_page($arg="", $param="") {
       //
     }
}
?>
