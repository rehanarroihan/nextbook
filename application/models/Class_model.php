<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Class_model extends CI_Model {

	public function insert(){
		$uid = $this->session->userdata('uid');
		$code = $this->generateCode();
		$object = array(
			'classid'		=> $code, 
			'created_by'	=> $uid,
			'name'			=> $this->input->post('name'),
			'descript'		=> $this->input->post('descript'),
			'member'		=> $uid
		);
		$this->db->insert('class', $object);
		$this->db->where('uid', $uid)->update('user',  array('classid' => $code));
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function generateCode(){
		$done = 0;
		do{
			$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	    	$code = '';
	    	for ($i = 0; $i < 7; $i++){
	        	$code .= $characters[mt_rand(0, 61)];
	    	}
	    	$check = $this->db->where('classid', $code)->get('class');
	    	if($check->num_rows() == 0){
	    		$done = 1;
	    	}else{
	    		$code = '';
	    	}
		}while($done != 1);
		return $code;
	}

	public function isHave(){
		$ehe = $this->db->where('uid', $this->session->userdata('uid'))->get('user');
		if($ehe->row()->classid != NULL){
			return true;
		}else{
			return false;
		}
	}

	public function getClassData(){
		$classID = $this->db->where('uid', $this->session->userdata('uid'))
								->get('user')->row()->classid;
		return $this->db->where('classid', $classID)->get('class')->row();
	}

	public function join($code){
		$this->db->where('uid', $this->session->userdata('uid'))->update('user',  array('classid' => $code));
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}

/* End of file Class_model.php */
/* Location: ./application/models/Class_model.php */