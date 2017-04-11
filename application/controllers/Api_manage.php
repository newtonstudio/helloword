<?php
class Api_manage extends CI_Controller{
	private $data = array();
	public function __construct(){
		parent::__construct();
		$this->data['starttime'] = microtime(true);
		if(isset($_GET['mode'])) {
			switch($_GET['mode']) {
				case "xml":
					$this->data['mode'] = "xml";
					break;
				default:
					$this->data['mode'] = "json";
					break;
			}
		} else {
			$this->data['mode'] = "json";
		}
	}	

	public function getContactList(){

		$result = array();
		for($i=0; $i < 10; $i++) {
			$result[] = $i;
		}		
 		$this->json_output($result);
	}

	public function insertContact(){

	}


	// function defination to convert array to xml
	public function array_to_xml( $data, &$xml_data ) {
	    foreach( $data as $key => $value ) {
	        if( is_numeric($key) ){
	            $key = 'item'.$key; //dealing with <0/>..<n/> issues
	        }
	        if( is_array($value) ) {
	            $subnode = $xml_data->addChild($key);
	            $this->array_to_xml($value, $subnode);
	        } else {
	            $xml_data->addChild("$key",htmlspecialchars("$value"));
	        }
	     }
	}

	public function json_output($result){
		$this->data['endtime'] = microtime(true);
		$timediff = $this->data['endtime'] - $this->data['starttime'];

		if($this->data['mode'] == "json") {
			echo json_encode(array(
				'status' => "OK",
				'result' => $result,
				'time_elapsed' => ($timediff),
			));
		} else {
			$simplexml = new SimpleXMLElement('<?xml version="1.0"?><results />');
			$final_result = array(
				'status' => "OK",
				'result' => $result,
				'time_elapsed' => ($timediff),
			);
			$this->array_to_xml($final_result, $simplexml);			
			echo $simplexml->asXML();
		}
	}

	public function googlelogin(){

		$googleID = $this->input->post("ID", true);
		$Name = $this->input->post("Name", true);
		$URL = $this->input->post("URL", true);
		$Email = $this->input->post("Email", true);

		$this->load->model('User_model');

		$dataExists = $this->User_model->getOne(array(
			'email' => $Email,
			'is_deleted' => 0,
		));

		if(!empty($dataExists)) {

			$this->User_model->update(array(
				'id' => $dataExists['id'],
			), array(
				'GoogleID' => $googleID,
				'GoogleName' => $Name,
				'GooglePhoto' => $URL,
				'modified_date' => date("Y-m-d H:i:s"),
			));

			$user_id = $dataExists['id'];

		} else {

			$user_id = $this->User_model->insert(array(
				'email' => $Email,
				'password' => sha1(date("YmdHis")), 
 				'GoogleID' => $googleID,
				'GoogleName' => $Name,
				'GooglePhoto' => $URL,
				'created_date' => date("Y-m-d H:i:s"),
			));

		}

		$this->load->library("session");
		$this->session->set("user_id", $user_id);

		$this->json_output(array(
			'user_id' => $user_id,
		));

	}

	public function facebooklogin(){
		$fbID = $this->input->post("id", true);
		$name = $this->input->post("name", true);		
		$email = $this->input->post("email", true);

		$this->load->model('User_model');

		$dataExists = $this->User_model->getOne(array(
			'email' => $email,
			'is_deleted' => 0,
		));

		if(!empty($dataExists)) {

			$this->User_model->update(array(
				'id' => $dataExists['id'],
			), array(
				'FBID' => $fbID,
				'FBname' => $name,				
				'modified_date' => date("Y-m-d H:i:s"),
			));

			$user_id = $dataExists['id'];

		} else {

			$user_id = $this->User_model->insert(array(
				'email' => $email,
				'password' => sha1(date("YmdHis")), 
 				'FBID' => $fbID,
				'FBname' => $name,	
				'created_date' => date("Y-m-d H:i:s"),
			));

		}

		$this->load->library("session");
		$this->session->set("user_id", $user_id);

		$this->json_output(array(
			'user_id' => $user_id,
		));
	}

}
?>