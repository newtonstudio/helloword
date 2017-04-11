<?php
class Unittest extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library("unit_test");
		$this->load->model('Banner_model');
	}
	public function index(){

		//INSERT DATA INTO DB
		$insert_array = array(
			'title' => "C",
			'image' => "/assets/template/images/shop-slide-3.jpg",
			'is_deleted' => 1,
			'created_date' => date("Y-m-d H:i:s"),
			'modified_date' => date("Y-m-d H:i:s"),
		);

		$bannerID = $this->Banner_model->insert($insert_array);
		//TO MAKE THE ARRAY SAME structure ast getONE
		$insert_array['bannerID'] = $bannerID;

		$bannerData = $this->Banner_model->getOne(array('bannerID'=>$bannerID));


		//TEST 1
		//RUN THE TEST
		$this->unit->run($insert_array,$bannerData,"banner insert is equal to getONE");

		//TEST 2
		$bannerList = $this->Banner_model->get_where(array());
		$this->unit->run($bannerList,'is_array',"banner list is array");

		echo $this->unit->report();
	}
}
?>