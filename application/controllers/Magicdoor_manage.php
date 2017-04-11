<?php
class Magicdoor_manage extends CI_Controller{

	private $data = array();
	public function __construct(){
		parent::__construct();
		$this->load->library("session");
		$user_id = $this->session->get("user_id");
		if($user_id == false) {
			redirect(base_url("magicdoor/login"),'refresh');
		} 

	}

	public function generatePageView(){
		$this->load->model('Pageview_model');
		for($i=0; $i < 1000; $i++){
			$this->Pageview_model->insert(array(
				'created_date' => date("Y-m-d H:i:s", time()-rand(1,365)*24*3600)
			));
		}
		echo "OK";

	}
	
	public function dashboard(){

		$this->load->model('Pageview_model');

		$myTable = array();
		$myTable[] = array(
			'Date', 'pageView', 'unique'
			);

		$table_header = array();
		$table_header = array("pageView","unique");
		$this->data['table_header'] = $table_header;


		$tmp = array();
		$datalist = $this->Pageview_model->get_where(array('is_deleted'=>0));
		if(!empty($datalist)) {
			foreach($datalist as $v) {
				//Y-m-d
				$date = substr($v['created_date'], 0, 10);
				if(isset($tmp[$date])){
					$tmp[$date]++;
				} else {
					$tmp[$date] = 1;		
				}
			}
		}

		ksort($tmp);

		if(!empty($tmp)) {
			foreach($tmp as $k=>$v) {
				$u = rand(0, $v);
				$myTable[] = array(
					$k, $v, $u,
				);
			}
		}



		$this->data['myTable'] = json_encode($myTable); 


		$this->load->view("magicdoor/dashboard", $this->data);

	}
}

?>