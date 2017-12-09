<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Profile_model');
		$this->load->model('Setting_model');
		if($this->session->userdata('auth') == false){
			redirect('auth/login');
		}
	}

	public function index(){
		$data['title'] = 'Profiles';
		$data['primary_view'] = 'profile/profile_view';
		$data['interface'] = $this->Setting_model->get_interface();
		$data['detail'] = $this->Profile_model->getProfileDetail();
		$this->load->view('template_view', $data);
	}

	public function edit(){
		$data['primary_view'] = 'profile/profile_edit_view';
		$data['detail'] = $this->Profile_model->getProfileDetail();
		$data['interface'] = $this->Setting_model->get_interface();
		$this->load->view('template_view', $data);
	}

	public function executeedit()
	{
		if ($this->session->userdata('oauth_provider') == 'facebook') {
			# code...
			$profile = '';
			$ident = '';
			if($this->Profile_model->editProfile($profile,$ident = '') == TRUE){
				$object = array(
					'dspname' => $this->Profile_model->getProfileDetail()->dspname, 
					'email' => $this->Profile_model->getProfileDetail()->email
				);
				$this->session->set_userdata( $object );
				$this->session->set_flashdata('announce', 'Profile Success to Update');
				redirect('Profile/edit');
			}else{
				$this->session->set_flashdata('announce', 'Profile Failde to Update');
				redirect('Profile/edit');
			}
		}else{
			$config['upload_path'] = './assets/2.0/img/user/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = 2000;
			
			$this->upload->initialize($config);
				if ($this->upload->do_upload('profilepict')){
					$ident = '';
					if($this->Profile_model->editProfile($this->upload->data(),$ident) == TRUE){
						$object = array(
							'dspname' => $this->Profile_model->getProfileDetail()->dspname, 
							'email' => $this->Profile_model->getProfileDetail()->email
						);
						$this->session->set_userdata( $object );
						$this->session->set_flashdata('announce', 'Profile Success to Update');
						redirect('Profile/edit');
					}else{
						$this->session->set_flashdata('announce', 'Profile Failed to Update');
						redirect('Profile/edit');
					}
				}else{
					$profile = '';
					$ident = $this->Profile_model->getProfileDetail()->profilepict;
					if($this->Profile_model->editProfile($profile,$ident) == TRUE){
						$object = array(
							'dspname' => $this->Profile_model->getProfileDetail()->dspname, 
							'email' => $this->Profile_model->getProfileDetail()->email
						);
						$this->session->set_userdata( $object );
						$this->session->set_flashdata('announce', 'Profile Success to Update');
						redirect('Profile/edit');
					}else{
						$this->session->set_flashdata('announce', 'Profile Failed to Update');
						redirect('Profile/edit');
					}
				}
		}
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */
