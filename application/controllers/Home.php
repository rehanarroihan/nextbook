<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('auth') == false){
			redirect('auth');
		}
	}

	public function index(){
		$this->load->view('main_view');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */