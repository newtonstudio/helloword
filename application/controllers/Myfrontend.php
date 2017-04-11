<?php
class Myfrontend extends CI_Controller {

	private $data = array();

	public function __construct(){
		parent::__construct();

		$this->data['pageName'] = "";
		$this->data['pageTitle'] = "My Shopping Mall";
		$sections = array(
		        'config'  => TRUE,
		        'queries' => TRUE
		);

		$this->output->set_profiler_sections($sections);
		$this->output->enable_profiler(TRUE);

	}
	public function index(){

		$this->benchmark->mark('MYloadModel_start');
		$this->load->model('Banner_model');
		$this->load->model('Product_model');
		$this->benchmark->mark('MYloadModel_end');

		$this->benchmark->mark('BannerloadModel_start');
		$bannerList = $this->Banner_model->get_where(array(
			'is_deleted' => 0,
		),"created_date","DESC");
		$this->benchmark->mark('BannerloadModel_end');

		$this->data['bannerList'] = $bannerList;

		$this->data['pageName'] = "index";
		$this->data['pageTitle'] = "My Shopping Mall - Home";

		$this->load->view("myfrontend/header", $this->data);
		$this->load->view("myfrontend/index", $this->data);
		$this->load->view("myfrontend/footer", $this->data);
	}
	public function about(){

		$this->data['pageName'] = "about";
		$this->data['pageTitle'] = "My Shopping Mall - About";
		
		$this->load->view("myfrontend/header", $this->data);
		$this->load->view("myfrontend/about", $this->data);
		$this->load->view("myfrontend/footer", $this->data);
	}
	public function products(){

		$this->data['pageName'] = "products";
		$this->data['pageTitle'] = "My Shopping Mall - Products";
		
		$this->load->view("myfrontend/header", $this->data);
		$this->load->view("myfrontend/products", $this->data);
		$this->load->view("myfrontend/footer", $this->data);

	}
	public function productDetail($productID, $productName){

		$this->data['pageName'] = "productDetail";
		$this->data['pageTitle'] = "My Shopping Mall - Product Detail";
		
		$this->load->view("myfrontend/header", $this->data);
		$this->load->view("myfrontend/productDetail", $this->data);
		$this->load->view("myfrontend/footer", $this->data);
	}

	//sender
	public function contactus(){

		$this->data['pageName'] = "contactus";
		$this->data['pageTitle'] = "My Shopping Mall - Contact Us";
		
		$this->load->view("myfrontend/header", $this->data);
		$this->load->view("myfrontend/contactus", $this->data);
		$this->load->view("myfrontend/footer", $this->data);

	}

	//receiver
	public function contactus_submit(){
		//htmlspecialchars($_POST['name']);
		$name = $this->input->post("name", true);
		$email = $this->input->post("email", true);
		$subject = $this->input->post("subject", true);
		$message = $this->input->post("message", true);

		$this->load->model("Contact_Model");
		$this->load->library('emailer');

		$this->Contact_Model->insert(array(
			'name' => $name,
			'email' => $email,
			'subject' => $subject,
			'message' => $message,
			'created_date' => date("Y-m-d H:i:s"),
		));

		$this->emailer->sendmail($subject, $message."<br/>Name: ".$name."<br/>Email: ".$email);

		redirect(base_url('contact_us_thanks'),'refresh');



	}
	//after submission
	public function contact_us_thanks(){
		$this->data['pageName'] = "contactus";
		$this->data['pageTitle'] = "My Shopping Mall - Contact Us";
		
		$this->load->view("myfrontend/header", $this->data);
		$this->load->view("myfrontend/contact_us_thanks", $this->data);
		$this->load->view("myfrontend/footer", $this->data);
	}

	public function generatePageView(){

		$this->load->model('Pageview_model');

		for($i=0; $i < 1000; $i++) {

			$this->Pageview_model->insert(array(
				'is_deleted' => 0,
				'created_date' => date("Y-m-d H:i:s", time()-rand(1,365)*24*rand(1,3600)),
			));

		}

	}

	public function pageViewChart(){

		$this->load->model('Pageview_model');
		$pageDatas = $this->Pageview_model->get_where(array(
			'is_deleted' => 0,
		));

		//To collect a unique date key array
		$myDateCollector = array();
		if(!empty($pageDatas)) {
			foreach($pageDatas as $k=>$v) {
				$dateKey = substr($v['created_date'],0,10);
				if(isset($myDateCollector[$dateKey])) {
					$myDateCollector[$dateKey]++;
				} else {
					$myDateCollector[$dateKey] = 1;
				}
			}
		}

		//Sort the array by key (Date ordering)
		ksort($myDateCollector);

		//To assemable the array
		$myFinalData = array();
		$myFinalData[] = array("Date", "pageView");
		if(!empty($myDateCollector)) {
			foreach($myDateCollector as $k=>$v) {
				$myFinalData[] = array(
					$k, (int)$v,
				);
			}
		}
		$this->data['myFinalData'] = json_encode($myFinalData);


		$this->load->view("myfrontend/header", $this->data);
		$this->load->view("myfrontend/pageViewChart", $this->data);
		$this->load->view("myfrontend/footer", $this->data);

	}

	public function ajaxTest(){
		$this->load->view("myfrontend/header", $this->data);
		$this->load->view("myfrontend/ajaxTest", $this->data);
		$this->load->view("myfrontend/footer", $this->data);
	}

	public function complicated(){

		$products = array();
		$products = array(
			array("productID"=>1, "title"=>"Long sleeves", "price"=>39, 
				"size" => array("S","M","L"), 
				"color" => array("Red","Blue","Green")
			),
			array("productID"=>2, "title"=>"Short pants", "price"=>29, 
				"size" => array("XS","S","M","L"), 
				"color" => array("White","Black","Pink")
			),
			array("productID"=>3, "title"=>"Long pants", "price"=>129, 
				"size" => array("XS","S","M","L"), 
				"color" => array("Blue","Black","Pink")
			),
		);

		$this->data['products'] = $products;


		$this->load->view("myfrontend/header", $this->data);
		$this->load->view("myfrontend/complicated", $this->data);
		$this->load->view("myfrontend/footer", $this->data);
	}

	public function complicated_submit(){
		$wholeData = $this->input->post("myContainer", true);
		$json = json_decode($wholeData, true);
		print_r($json);
	}

}

?>