<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Profile_model');
		$this->load->model('Setting_model');
		if($this->session->userdata('username') == ''){
			redirect('auth/login');
		}
	}

	public function index(){
		$data['title'] = 'Profiles';
		$data['primary_view'] = 'profile/profile_view';
		$data['interface'] = $this->Setting_model->get_interface();
		$this->load->view('template_view', $data);
	}

	public function edit(){
		$data['primary_view'] = 'profile/profile_edit_view';
		$data['detail'] = $this->Profile_model->getProfileDetail();
		$data['interface'] = $this->Setting_model->get_interface();
		$this->load->view('template_view', $data);
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */
