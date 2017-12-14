
<?php

class User implements \JsonSerializable {

    public $user;

    public function __construct($controller) {
	$this->user = $controller->getCurrentUser();
    }


    public function jsonSerialize() {
	$json_obj = new \stdClass;
	$json_obj->user = $this->user;
	return $json_obj;
    }
  
}
?>
