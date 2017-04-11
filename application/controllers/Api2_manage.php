<?php
class Api2_manage extends CI_Controller{
	private $data = array();
	public function __construct(){
		parent::__construct();
		$this->load->model('Pageview_model');
		$this->data['starttime'] = microtime(true); 
	}

	public function forloop($method=1){

		$myArray = array();
		for($i=0; $i<100000;$i++) {
			$myArray[] = rand(1,1000);
		}

		$total_view = 0;
		switch($method) {
			case 1: //put count in every method				
				for($i=0; $i < count($myArray); $i++) {
					$total_view+=$myArray[$i];
				}

				break;
			case 2: // count first			
				$count = count($myArray);
				$total_view = 0;
				for($i=0; $i < $count; $i++) {
					$total_view+=$myArray[$i];
				}
				break;			
		}
		

		$this->data['endtime'] = microtime(true);
		$diff = $this->data['endtime'] - $this->data['starttime'];

		echo json_encode(array(
			'status' => "OK",
			'result' => $total_view,
			'method' => 1,
			'durations' => $diff,
		));

	}


	public function getPageView($method=1){
		

		switch($method) {
			case 1: // SQL COUNT(*)
				$count = $this->Pageview_model->count(array(
					'is_deleted' => 0,
				));
				break;
			case 2: // php count()
				$data = $this->Pageview_model->get_where(array(
					'is_deleted' => 0,
				));
				$count = count($data);
				break;
			case 3: //foreach count
				$data = $this->Pageview_model->get_where(array(
					'is_deleted' => 0,
				));
				$number = 0;
				foreach($data as $v) {
					$number++;
				}
				$count = $number;
				break;
		}
		

		$this->data['endtime'] = microtime(true);
		$diff = $this->data['endtime'] - $this->data['starttime'];

		echo json_encode(array(
			'status' => "OK",
			'result' => $count,
			'method' => 1,
			'durations' => $diff,
		));
	}

	public function googlelogin() {
		$ID = $this->input->post("ID", true);
		$Name = $this->input->post("Name", true);
		$URL = $this->input->post("URL", true);
		$Email = $this->input->post("Email", true);
	}
}


?>