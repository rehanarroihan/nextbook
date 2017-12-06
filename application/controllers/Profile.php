<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Profile_model');
		if($this->session->userdata('username') == ''){
			redirect('auth/login');
		}
	}

	public function index(){
		$data['title'] = 'Profiles';
		$data['primary_view'] = 'profile/profile_view';
		$this->load->view('main_view', $data);
	}

	public function edit(){
		$data['primary_view'] = 'profile/profile_edit_view';
		$data['detail'] = $this->Profile_model->getProfileDetail();
		$this->load->view('main_view', $data);
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */
