<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {

	public function getProfileDetail(){
		return $this->db->where('username', $this->session->userdata('username'))->get('user')->row();
	}

}

/* End of file Profile_model.php */
/* Location: ./application/models/Profile_model.php */