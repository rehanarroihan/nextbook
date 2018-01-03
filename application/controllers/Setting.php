<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Setting_model');
		$this->load->model('Profile_model');
		if($this->session->userdata('auth') == false){
			redirect('auth');
		}
	}

	public function index()
	{
		$data['title'] = 'Setting';
		$data['primary_view'] = 'setting/setting_view';
		$data['iface'] = $this->Setting_model->get_interface();
		$data['interface'] = $this->Setting_model->get_interface();
		$data['detail'] = $this->Profile_model->getProfileDetail();
		$this->load->view('template_view', $data);
	}

	public function edit_setting()
	{
		if ($this->Setting_model->edit_interface() == TRUE) {
			$this->session->set_flashdata('announce', 'Your Interface Success Update, Have Fun With Your New Interface');
			redirect('Setting');
		}else{
			$this->session->set_flashdata('announce', 'Something Wrong');
			redirect('Setting');
		}
	}

}

/* End of file Setting.php */
/* Location: ./application/controllers/Setting.php */