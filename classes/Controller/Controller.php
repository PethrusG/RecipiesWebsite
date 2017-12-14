<?php


/* namespace \classes\Controller*/

include 'classes/Integration/StoreDB.php';
include_once 'classes/Model/Comment.php';

class Controller implements \JsonSerializable  {
    public $db;
    public $user;

    // public function __construct($user, $comment, $timestamp) {
    public function __construct() {
	//	include 'classes/Integration/StoreDB.php';
	$this->db = new StoreDB();
	$this->user = NULL;
	//	$this->comment = $comment;
	//	$this->timestamp = $timestamp;
    }
    // TODO Make this private to protect from tampering with username?
    function setCurrentUser($currentUser) {
	//	$_SESSION['user'] = $currentUser;
	$this->user = $currentUser;
    }

    function getCurrentUser() {
	return $this->user;
    }
    
    function retrieveComments() {
	//	$this->db = new StoreDB();
	return $this->db->retrieveComments();
    }

    function retrieveCommentsJS() {
	//	$this->db = new StoreDB();
	$dbComments = $this->db->retrieveComments();
	return json_encode($dbComments[0]);
    }

    function retrieveCommentsP() {
	//	$this->db = new StoreDB();
	return $this->db->retrieveCommentsP();
    }

    function deleteComment($timestamp) {
	$this->db->deleteComment($timestamp);
    }

    function deleteCommentP($timestamp) {
	$this->db->deleteCommentP($timestamp);
    }

    function addComment($comment) {
	$timestamp = time(); // Time in microseconds since 1970
	$myComment = new Comment($this->user, $comment, $timestamp);
	$serialComment = serialize($myComment);
	$this->db->addComment($timestamp, $serialComment);
    }

    function addCommentP($comment) {
	$timestamp = time(); // Time in microseconds since 1970
	$myComment = new Comment($this->user, $comment, $timestamp);
	$serialComment = serialize($myComment);
	$this->db->addCommentP($timestamp, $serialComment);
    }

    function login($userName, $passwordReq) {
	if ($this->db->retrieveUserPassword($userName, $passwordReq))
	    return TRUE;
	else
	    return FALSE;
    }

    /* function registerUser($newUser, $newPassword) {
       $this->db->registerUser($newUser, $newPassword);
       $this->setCurrentUser($newUser);
     * }*/

    function registerUser($newUser, $newPassword) {
	$newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
	$this->db->registerUser($newUser, $newPasswordHash);
	$this->setCurrentUser($newUser);
    }

    function getComments() {
	// TODO Lägg in koden "Retrieve all objects of type Comment" ifrån
	// recipePancakesDynamic.php här.
	// Låt denna funktion avgöra vilka kommentarer som visas med deleteknappar.

    }

    public function jsonSerialize() {
	$json_obj = new \stdClass;
	$json_obj->user = $this->user;
	return $json_obj;
    }
  
}

?>
