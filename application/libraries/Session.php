<?php
class Session{
	public function __construct(){
		session_start();		
	}

	public function session(){
		session_start();
	}

	public function set($key, $val){
		$_SESSION[$key] = $val;
	}

	public function get($key){
		return isset($_SESSION[$key])?$_SESSION[$key]:false;
	}

	public function remove(){
		session_destroy();
	}
}

?>