<?php
class Scheduler_manage extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	public function getPrice(){

		$price = 0;

		$json = file_get_contents("http://finance.yahoo.com/webservice/v1/symbols/allcurrencies/quote?format=json");

		$pArray = json_decode($json, true);

		foreach($pArray['list']['resources'] as $v) {

			if($v['resource']['fields']['name'] == "USD/MYR") {
				$price = $v['resource']['fields']['price'];
			}

		}

		$this->load->model('Currencyhistory_model');

		$this->Currencyhistory_model->insert(array(
			'currency' => $price,
			'created_date' => date("Y-m-d H:i:s"),
		));

		echo $price;

	}
}

?>