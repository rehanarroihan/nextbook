<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function getStatus($usr){
		$query = $this->db->where('username', $usr)->get('user')->row()->status;
		if($query == 'verified'){
			$q1 = $this->db->where('username', $usr)->get('user');
			$user = array(
				'uid' => $q1->row()->uid,
				'dspname' => $q1->row()->dspname,
				'username' => $q1->row()->username,
				'email'	=> $q1->row()->email,
				'auth' => true
			);
			$this->session->set_userdata($user);
			$uid = $q1->row()->uid;
			$now = date('Y/m/d H:i:s');
			$this->db->set('last_login', $now)->where('uid', $uid)->update('user');
			return true;
		}else{
			return false;
		}
	}

	public function checkStatus($usr){
		$query = $this->db->where('username', $usr)->get('user')->row()->status;
		if($query == 'verified'){
			return false;
		}else{
			return true;
		}
	}

	public function loginVal(){
		$login = $this->input->post('login');
		$password = $this->input->post('password');
		$query = $this->db->where('username', $login)
							->where('password', $password)
							->get('user');
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function usernameCheck($input){
		$hue = $this->db->where('username', $input)->get('user');
		if($hue->num_rows() == 0){
			return true;
		}else{
			return false;
		}
	}

	public function emailCheck($input){
		$hue = $this->db->where('email', $input)->get('user');
		if($hue->num_rows() == 0){
			return true;
		}else{
			return false;
		}
	}

	public function generateUID(){
		$query = $this->db->order_by('uid', 'DESC')->limit(1)->get('user')->row('uid');
		$lastNo = substr($query, 3, 3);
		$next = $lastNo + 1;
		$kd = 'usr';
		return $kd.sprintf('%03s', $next).date('ymd');
	}

	public function regVal(){
		$usinfo = array(
			'uid'		=> $this->generateUID(),
			'dspname'	=> $this->input->post('fullname'),
			'username'	=> $this->input->post('username'),
			'email'		=> $this->input->post('email'),
			'password'	=> $this->input->post('password'),
			'last_login'	=> '',
			'status'	=> 'unverified'
		);

		$this->db->insert('user', $usinfo);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function activation($username){
		$this->db->set('status', 'verified')->where('username', $username)->update('user');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function getUIDfromEmail($email){
		return $this->db->where('email', $email)->get('user')->row()->uid;
	}

	public function getUSRfromEmail($email){
		return $this->db->where('email', $email)->get('user')->row()->username;
	}

	public function reqChangePass($email){
		$data = array(
			'uid'		=> $this->getUIDfromEmail($email),
			'dte_req'	=> date('Y-m-d'),
			'status'	=> 'unmodified'
		);
		$this->db->insert('chngpassreq', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */
