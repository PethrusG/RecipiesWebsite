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
	echo $this->user . "<br>";
    }
    
    function getComment() {
	echo $this->comment . "<br>";
    }
    
    function getTimestamp() {
	echo $this->timestamp . "<br>";
    }
    function getUserComment() {
	$array = array(
	    $this->user => $this->comment,
	);
	/* $array = array(
	   "kalle" => "lingon",
	   );*/
	print_r($array);

    }
}
?>
