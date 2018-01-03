<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {

	public function get_interface()
	{
		return $this->db->where('uid',$this->session->userdata('uid'))->get('setting')->row();
	}

	public function edit_interface()
	{
        $query = $this->db->where('uid',$this->session->userdata('uid'))->get('setting');
        $check = $query->num_rows();

		if ($check > 0) {
			$data = array(
				'color' => $this->input->post('color'),
				'image' => $this->input->post('image')
					);
			$this->db->where('uid',$this->session->userdata('uid'))->update('setting', $data);
		}else{
			$data = array(
				'uid' => $this->session->userdata('uid'),
				'color' => $this->input->post('color'),
				'image' => $this->input->post('image')
					);
			$this->db->insert('setting', $data);
		}

		if ($this->db->affected_rows()) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

}

/* End of file Setting_model.php */
/* Location: ./application/models/Setting_model.php */