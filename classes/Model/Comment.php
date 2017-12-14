<?php

class Comment implements \JsonSerializable {
    public $user;
    public $comment;
    public $timestamp;

    public function __construct($user, $comment, $timestamp) {
	$this->user = $user;
	$this->comment = $comment;
	$this->timestamp = $timestamp;
	/* $this->user = "Kalle";
	   $this->comment = "Blabla!";
	   $this->timestamp = "494949";*/
    }

    function getUser() {
	return $this->user;
    }
    
    function getComment() {
	return $this->comment;
    }
    
    function getTimestamp() {
	return $this->timestamp;
    }
    function getUserComment() {
	$array = array(
	    $this->user => $this->comment,
	);
	/* $array = array(
	   "kalle" => "lingon",
	   );*/
	return $array;
    }

    function unserializeComments($arr) {

	// Unserialize all object Comments from DB
	$arrayUns = [];
	for ($i = 0; $i < count($array); $i++){
	    $arrayUns[$i] = unserialize($array[$i]);
	}
	return $arrayUns;
    }

    public function jsonSerialize() {
	$json_obj = new \stdClass;
	$json_obj->user = $this->user;
	$json_obj->comment = $this->comment;
	$json_obj->timestamp = $this->timestamp;
	return $json_obj;
    }
  
}
?>
