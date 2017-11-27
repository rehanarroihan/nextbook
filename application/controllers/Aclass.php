<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aclass extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['primary_view'] = 'class/no_class_view';
		$this->load->view('main_view', $data);
	}

}

/* End of file Class.php */
/* Location: ./application/controllers/Class.php */