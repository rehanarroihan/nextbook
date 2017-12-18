<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Endroid\QrCode\QrCode;
require APPPATH .'libraries/vendor/autoload.php';

class Aclass extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Class_model');
		$this->load->model('Profile_model');
		$this->load->model('Setting_model');
		if($this->session->userdata('auth') == false){
			redirect('auth');
		}
	}

	public function index(){
		if($this->Class_model->isHave() == true){
			$data['primary_view'] = 'class/class_view';
			//$data['isadmin'] = $this->Class_model->isAdmin();
			$data['classdata'] = $this->Class_model->getClassData();
			$data['memberlist'] = $this->Class_model->memberList();
		}else{
			$data['primary_view'] = 'class/no_class_view';
		}
		$data['interface'] = $this->Setting_model->get_interface();
		$data['detail'] = $this->Profile_model->getProfileDetail();
		$this->load->view('template_view', $data);
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

	public function unenroll(){
		if($this->Class_model->isHave() == true){
			if($this->Class_model->unenroll() == true){
				$this->session->set_flashdata('announce', 'You unenroll a class');
				redirect('aclass');
			}else{
				$this->session->set_flashdata('announce', 'Error');
				redirect('aclass');
			}
		}else{
			
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

	public function executesetting()
	{
		$config['upload_path'] = './assets/2.0/img/group/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = 2000;
		
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('classpict')){
			$ident = '';
			if ($this->Class_model->setting($this->upload->data(),$ident) == TRUE) {
				$this->session->set_flashdata('announce', 'Group Setting Success to Update');
				redirect('aclass');
			} else {
				$this->session->set_flashdata('announce', 'Group Setting Failed to Update');
				redirect('aclass');
			}
		} else {
			$foto = '';
			$ident = $this->Class_model->getClassData()->photo;
			if ($this->Class_model->setting($foto,$ident)) {
				$this->session->set_flashdata('announce', 'Group Setting Success to Update');
				redirect('aclass');
			} else {
				$this->session->set_flashdata('announce', $this->upload->display_errors());
				redirect('aclass');
			}
		}
	}

	//Jangan di akses
	public function member(){
		if($this->input->post('estehplastikan')){
			$data['memberlist'] = $this->Class_model->memberList();
			$data['classdata'] = $this->Class_model->getClassData();
			$this->load->view('class/member_view', $data);
		}else{
			$this->load->view('errors/404_view');
		}
	}

	public function schedule(){
		if($this->input->post('sempolcrispy')){
			$data['memberlist'] = $this->Class_model->memberList();
			$data['classdata'] = $this->Class_model->getClassData();
			$this->load->view('class/schedule_view', $data);
		}else{
			$this->load->view('errors/404_view');
		}
	}

	public function editschedule(){
		if($this->input->post('day')){
			$this->load->view('class/edit_schedule_view');
		}else{
			$this->load->view('errors/404_view');
		}
	}

	public function setting(){
		$data['classdata'] = $this->Class_model->getClassData();
		if($this->input->post('sempolcrispy')){
			$this->load->view('class/setting_view',$data);
		}else{
			$this->load->view('errors/404_view');
		}
	}
}
/* End of file Aclass.php */
/* Location: ./application/controllers/Aclass.php */