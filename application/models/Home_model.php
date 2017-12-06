<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function getCardCount(){
		$uid = $this->getUID();
		$query = $this->db->where('uid', $uid)->where('status', 'active')->count_all_results('card');
		if($query != 0){
			return true;
		}else{
			return false;
		}
	}

	public function getCardList(){
		return $this->db->where('uid', $this->getUID())->get('card')->result();
	}

	public function createcard(){
		$data = array(
			'card_id' => $this->generateID(),
			'uid'	=> $this->getUID(),
			'card_name' => $this->input->post('cardname'),
			'card_desc' => $this->input->post('carddesc'),
			'color' => $this->input->post('color'),
			'card_dt' => date('Y/m/d'),
			'status' => 'active' 
		);
		$this->db->insert('card', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function savecard($cid){
		$data = array(
			'card_name' => $this->input->post('cardname'),
			'card_desc' => $this->input->post('carddesc'),
			'color' => $this->input->post('color'),
		);
		$this->db->where('card_id', $cid)->update('card', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function generateID(){
		//crd001
		$query = $this->db->order_by('card_id', 'DESC')->limit(1)->get('card')->row('card_id');
		$lastNo = substr($query, 3, 3);
		$next = $lastNo + 1;
		$kd = 'crd';
		return $kd.sprintf('%03s', $next);
	}

	public function getUID(){
		return $this->db->where('username', $this->session->userdata('username'))
					->get('user')->row()->uid;
	}

	public function deleteCard($cid){
		$this->db->where('card_id', $cid)->delete('card');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}

/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */