<?php


class SessionManager {

    public static function getController() {
	if(isset($_SESSION['controller']))
	    return unserialize($_SESSION['controller']);
	else
	    return new Controller();
    }

    public static function storeController(Controller $controller) {
	$_SESSION['controller'] = serialize($controller);
    }
}

?>
