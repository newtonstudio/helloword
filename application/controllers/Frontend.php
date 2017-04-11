<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/index');
		$this->load->view('frontend/footer');
	}
	public function about()
	{	
		//write something here
		$this->load->view('frontend/header');
		$this->load->view('frontend/about');
		$this->load->view('frontend/footer');
	}
	public function products()
	{		
		$products = array();

		$this->load->library('pagination');

		$config['base_url'] = base_url('products');
		$config['total_rows'] = 10;
		$config['per_page'] = 2;
		$config['use_page_numbers'] = TRUE;

		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';

		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['first_link'] = 'First';

		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['last_link'] = 'Last';

		$config['prev_link'] = '<i class="fa fa-angle-left"></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['next_link'] = '<i class="fa fa-angle-right"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		//write something here
		$this->load->view('frontend/header');
		$this->load->view('frontend/products');
		$this->load->view('frontend/footer');
	}
	public function products_detail()
	{	
		//write something here	
		$this->load->view('frontend/header');
		$this->load->view('frontend/products_detail');
		$this->load->view('frontend/footer');
	}
	public function contactus()
	{		
		//write something here
		$this->load->view('frontend/header');
		$this->load->view('frontend/contactus');
		$this->load->view('frontend/footer');
	}
	public function contactus_submit()
	{		
		$this->load->model("Contact_model");

		$name = $this->input->post("name", true);
		$email = $this->input->post("email", true);
		$subject = $this->input->post("subject", true);
		$content = $this->input->post("content", true);

		$insert_array = array(
			'name' => $name,
			'email' => $email,
			'subject' => $subject,
			'content' => $content,
		);

		$this->Contact_model->insert($insert_array);


		//write something here
		$this->load->view('frontend/header');
		$this->load->view('frontend/contactus');
		$this->load->view('frontend/footer');
	}
}
?>