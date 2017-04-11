<?php
class Login_manage extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library("session");
		$user_id = $this->session->get("user_id");
		if($user_id !== false) {
			redirect(base_url("magicdoor/dashboard"),'refresh');
		} 
	}
	public function login(){
		
		$this->load->view("magicdoor/login");
	}
	public function login_submit(){

		$this->load->model("User_model");
		$this->load->library("session");

		
		//Safe Approach
		/*
		$email = $this->input->post("email", true);
		$password = $this->input->post("password", true);
		$userdata = $this->User_model->getOne(array(
			'email'=> $email,
			'password' => sha1($password),
			'is_deleted' => 0,
		));
		*/

		//Unsafe Approach
		$email = $_POST['email'];
		$password = $_POST['password'];
		$userdata = $this->User_model->get_where_cus(" email ='".$email."' AND password = '".$password."'");
		
		
		if(!empty($userdata)) {
			$this->session->set("user_id", $userdata['id']);
			redirect(base_url("magicdoor/dashboard"));

		} else {
			show_error("Invalid Username or password");
		}

	}

}

?>