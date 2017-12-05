<?php

class Comment {
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
}
?>
