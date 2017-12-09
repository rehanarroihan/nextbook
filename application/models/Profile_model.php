<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {

	public function getProfileDetail(){
		return $this->db->where('uid', $this->session->userdata('uid'))->get('user')->row();
	}

	public function editProfile($foto,$ident)
	{
		if ($this->session->userdata('oauth_provider') == 'facebook') {
			$object = array(
				'dspname' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('uname'), 
				'password' => $this->input->post('pass'),
				'gender' => $this->input->post('gender')
				);
			$this->db->where('uid', $this->session->userdata('uid'))->update('user', $object);
		}else{
			if ($foto == '') {
				$object = array(
					'dspname' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'profilepict' => $ident, 
					'username' => $this->input->post('uname'), 
					'password' => $this->input->post('pass'),
					'gender' => $this->input->post('gender')
					);
				$this->db->where('uid', $this->session->userdata('uid'))->update('user', $object);
			}else{
				$object = array(
					'dspname' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'profilepict' => $foto['file_name'], 
					'username' => $this->input->post('uname'), 
					'password' => $this->input->post('pass'),
					'gender' => $this->input->post('gender')
					);
				$this->db->where('uid', $this->session->userdata('uid'))->update('user', $object);
			}
		}
		if ($this->db->affected_rows()) {
				# code...
				return TRUE;
			}else{
				return FALSE;
			}
	}

}

/* End of file Profile_model.php */
/* Location: ./application/models/Profile_model.php */