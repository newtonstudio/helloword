<?php
class Logout_manage extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library("session");
		
	}
	public function logout(){
		
		$this->session->remove();
		redirect(base_url("magicdoor/login"),'refresh');
	}

}

?>