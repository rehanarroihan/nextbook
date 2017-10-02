<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Card_model extends CI_Model {

	public function cardAvailable($cid){
		$heyo = $this->db->where('card_id', $cid)->count_all_results('card');
		if($heyo != 0){
			return true; 
		}else{
			return false;
		}
	}

	public function getCardDetail($cid){
		return $this->db->where('card_id', $cid)->get('card')->row();
	}

	public function getValCount($cid){
		return $this->db->where('card_id', $cid)->count_all_results('file');
	}

	public function generateFileID(){
		//fle001 
		$query = $this->db->order_by('file_id', 'DESC')->limit(1)->get('file')->row('file_id');
		$lastNo = substr($query, 3, 3);
		$next = $lastNo + 1;
		$kd = 'fle';
		return $kd.sprintf('%03s', $next);
	}

	public function upload($data){
		$datas = array(
			'file_id' => $this->generateFileID(), 
		);
	}

	public function addLink(){
		$data = array(
			'file_id'	=> $this->generateFileID(),
			'card_id'	=> $this->input->post('card_id'),
			'file_name'	=> $this->input->post('link'),
			'filetype'	=> 'link',
			'dte_added'	=> date('Y-m-d')
		);
		$this->db->insert('file', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function getValue($cid){
		return $this->db->where('card_id', $cid)->get('file')->result();
	}

	public function isHis($cid){
		$ciduid = $this->db->where('card_id', $cid)->get('card')->row()->uid;
		$meh = $this->db->where('username', $this->session->userdata('username'))->get('user')->row()->uid;
		if($ciduid == $meh){
			return true;
		}else{
			return false;
		}
	}
}

/* End of file Card_model.php */
/* Location: ./application/models/Card_model.php */