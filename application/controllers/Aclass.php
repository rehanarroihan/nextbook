<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Endroid\QrCode\QrCode;
require APPPATH .'libraries/vendor/autoload.php';

class Aclass extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Class_model');
		if($this->session->userdata('auth') == false){
			redirect('auth');
		}
	}

	public function index(){
		if($this->Class_model->isHave() == true){
			$data['primary_view'] = 'class/class_view';
			$data['classdata'] = $this->Class_model->getClassData();
		}else{
			$data['primary_view'] = 'class/no_class_view';
		}
		$this->load->view('main_view', $data);
	}

	public function createclass(){
		if($this->input->post('class')){
			if($this->Class_model->insert()  == true){
				$this->session->set_flashdata('announce', 'Class created');
				redirect('aclass');
			}else{
				$this->session->set_flashdata('announce', 'an error ocurred');
				redirect('aclass');
			}
		}
	}

	public function checkcode(){
		$code = $this->input->post('code');
		if(!empty($code)){
			$check = $this->db->where('classid', $code)->get('class');
			if($check->num_rows() > 0){
				//Iki nek berhasil
				if($this->Class_model->join($code) == true){
					echo "1";
				}
			}else{
				echo "2";
			}
		}else{
			$this->load->view('errors/404_view');
		}
	}

	public function genqr(){
		$classid = $this->uri->segment(3);
		$size = $this->uri->segment(4);
		header('Content-Type: image/png');
		$qr = new QrCode($classid); 
		$qr->setSize($size);
		echo $qr->writeString();
	}

}

/* End of file Aclass.php */
/* Location: ./application/controllers/Aclass.php */