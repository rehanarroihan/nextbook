<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function checkUser_facebook($data = array()){
        $this->db->select('uid');
        $this->db->from('user');
        $this->db->where('oauth_provider',$data['oauth_provider']);
        $this->db->where('oauth_id',$data['oauth_id']);
        $prevQuery = $this->db->get();
        $prevCheck = $prevQuery->num_rows();
        
        if($prevCheck > 0){
            $prevResult = $prevQuery->row_array();
            /*$data['modified'] = date("Y-m-d H:i:s");
            $data['last_login'] = date("Y-m-d H:i:s");*/
            $object = array(
            	'modified' => date("Y-m-d H:i:s"), 
            	'last_login' => date("Y-m-d H:i:s"),
            	'locale' => $userData['locale'],
            	'profile_url' => $userData['profile_url'],
            	'picture_url' => $userData['picture_url']
            		);
            $this->db->where('oauth_id',$data['oauth_id'])->update('user',$object);
            $q1 = $this->db->where('oauth_id', $data['oauth_id'])->get('user');
            $userID = $this->generateUID();
            if($this->db->affected_rows() > 0) {
            	//$this->session->set_userdata('auth') == true;
            	$user = array(
					'uid' => $q1->row()->uid,
					'oauth_id' => $q1->row()->oauth_id,
					'oauth_provider' => $q1->row()->oauth_provider,
					'dspname' => $q1->row()->dspname,
					'username' => $q1->row()->username,
					'email'	=> $q1->row()->email,
					'auth' => true
				);
				$this->session->set_userdata($user);
            }
        }else{
        	$uid = $this->generateUID();
            $data['created'] = date("Y-m-d H:i:s");
            $data['modified'] = date("Y-m-d H:i:s");
            $data['uid'] = $uid;
            $data['last_login'] = date("Y-m-d H:i:s");
            $this->db->insert('user', $data);

            $object = array(
				'uid' => $uid,
				'color' => 'azure',
				'image' => 'sidebar-5.jpg'
					);
            $this->db->insert('setting', $object);

            $userID = $this->generateUID();
            if ($this->db->affected_rows() > 0) {
            	$this->session->set_userdata('auth') == true;
            }
        }
        return $userID?$userID:FALSE;
    }


	public function checkUser_google($data = array()){
        $this->db->select('uid');
        $this->db->from('user');
        $this->db->where('oauth_provider',$data['oauth_provider']);
        $this->db->where('oauth_id',$data['oauth_id']);
        $query = $this->db->get();
        $check = $query->num_rows();
        
        if($check > 0){
            $result = $query->row_array();
			$data['modified'] = date("Y-m-d H:i:s");
			$data['last_login'] = date("Y-m-d H:i:s");
			$this->db->where('oauth_id',$data['oauth_id'])->update('user',$usinfo);
			$q1 = $this->db->where('oauth_id', $data['oauth_id'])->get('user');
            $userID = $this->generateUID();
            if ($this->db->affected_rows() > 0) {
            	$user = array(
					'uid' => $q1->row()->uid,
					'oauth_id' => $ql->row()->oauth_id,
					'oauth_provider' => $ql->row()->oauth_provider,
					'dspname' => $q1->row()->dspname,
					'username' => $q1->row()->username,
					'email'	=> $q1->row()->email,
					'auth' => true
				);
				$this->session->set_userdata($user);
            }
        }else{
            $userID = $this->generateUID();
            $uid = $this->generateUID();
        	$data['created'] = date("Y-m-d H:i:s");
            $data['modified'] = date("Y-m-d H:i:s");
            $data['last_login'] = date("Y-m-d H:i:s");
            $data['uid'] = $uid;
            $this->db->insert('user', $usinfo);

            $object = array(
				'uid' => $uid,
				'color' => 'azure',
				'image' => 'sidebar-5.jpg'
					);
            $this->db->insert('setting', $object);

            if ($this->db->affected_rows() > 0) {
            	$this->session->set_userdata('auth') == true;
            }
        }
        return $userID?$userID:false;
    }

	public function getStatus($usr){
		$query = $this->db->where('username', $usr)->get('user')->row()->status;
		if($query == 'verified'){
			$q1 = $this->db->where('username', $usr)->get('user');
			$user = array(
				'uid' => $q1->row()->uid,
				'dspname' => $q1->row()->dspname,
				'username' => $q1->row()->username,
				'email'	=> $q1->row()->email,
				'profilepict' => $q1->row()->profilepict,
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

		$setting = $this->db->where('uid', $query->row()->uid)->get('setting');

		if ($setting->num_rows() <= 0) {
			$object = array(
				'uid' => $query->row()->uid,
				'color' => 'azure',
				'image' => 'sidebar-5.jpg'
					);
            return $this->db->insert('setting', $object);
		}
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
		$uid = $this->generateUID();
		$usinfo = array(
			'uid'		=> $uid,
			'dspname'	=> $this->input->post('fullname'),
			'username'	=> $this->input->post('username'),
			'email'		=> $this->input->post('email'),
			'password'	=> $this->input->post('password'),
			'last_login'	=> '',
			'status'	=> 'unverified'
		);

		$this->db->insert('user', $usinfo);

		$object = array(
				'uid' => $uid,
				'color' => 'azure',
				'image' => 'sidebar-5.jpg'
					);
        $this->db->insert('setting', $object);

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

	public function getDSPfromEmail($email){
		return $this->db->where('email', $email)->get('user')->row()->dspname;
	}

	public function generate32key(){
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    	$result = '';
    	for ($i = 0; $i < 32; $i++){
        	$result .= $characters[mt_rand(0, 61)];
    	}
    	return $result;
	}

	public function reqChangePass($email, $token){
		$data = array(
			'uid'		=> $this->getUIDfromEmail($email),
			'dte_req'	=> date('Y-m-d'),
			'token'		=> $token,
			'status'	=> 'unmodified'
		);
		$this->db->insert('chngpassreq', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function checkToken($token){
		$query = $this->db->where('token', $token)->get('chngpassreq');
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function checkPassStatus($token){
		$query = $this->db->where('token', $token)->get('chngpassreq')->row()->status;
		if($query == 'unmodified'){
			return true;
		}else{
			return false;
		}
	}

	public function goReset(){
		$uid = $this->db->where('token', $this->input->post('token'))->get('chngpassreq')->row()->uid;
		$this->db->set('password', $this->input->post('cpassword'))->where('uid', $uid)->update('user');
		$this->db->set('status', 'modified')->where('token', $this->input->post('token'))->update('chngpassreq');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */
