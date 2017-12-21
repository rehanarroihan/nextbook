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
			'dt_created'	=> date("Y-m-d"),
			'photo'			=> 'group.png'
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
		return $this->db->where('class.classid', $classID)
						->join('user', 'user.uid = class.created_by', 'left')
						->get('class')->row();
	}

	public function getClassID(){
		return $this->db->where('uid', $this->session->userdata('uid'))
								->get('user')->row()->classid;
	}

	public function join($code){
		$this->db->where('uid', $this->session->userdata('uid'))->update('user',  array('classid' => $code));
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function unenroll(){
		$this->db->where('uid', $this->session->userdata('uid'))->update('user',  array('classid' => NULL));
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function memberList(){
		$classid = $this->getClassData()->classid;
		return $this->db->where('classid', $classid)->get('user')->result();
	}

	public function setting($foto,$ident)
	{
		if ($foto == '') {
			$object = array(
				'name' => $this->input->post('name'), 
				'descript' => $this->input->post('descript'),
				'photo' => $ident
			);

			$this->db->where('classid', $this->input->post('classid'))->update('class',$object);
		} else {
			$object = array(
				'name' => $this->input->post('name'), 
				'descript' => $this->input->post('descript'),
				'photo' => $foto['file_name']
			);

			$this->db->where('classid', $this->input->post('classid'))->update('class',$object);
		}

		if ($this->db->affected_rows()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function getDayList($day){
		$classID = $this->getClassID();
		return $this->db->join('lesson', 'lesson.lessonid = schedule.lessonid', 'left')
		 					->where('schedule.classid', $classID)
							->where('schedule.day', $day)->order_by('schedule.start', 'asc')
							->get('schedule')->result();
	}

	public function getDayCount($day){
		$classID = $this->getClassID();
		return $this->db->where('classid', $classID)->where('day', $day)->count_all_results('schedule');
	}

	public function getLessonCount(){
		$classID = $this->getClassID();
		return $this->db->where('classid', $classID)->count_all_results('lesson');
	}

	public function getLessonList(){
		$classID = $this->getClassID();
		return $this->db->where('classid', $classID)->get('lesson')->result();
	}

	public function saveLesson(){
		$object = array(
			'lessonid'	=> null,
			'classid'	=> $this->getClassID(),
			'lesson'	=> $this->input->post('lesson'),
			'teacher'	=> $this->input->post('teacher') 
		);
		$this->db->insert('lesson', $object);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function saveSchedule(){
		$object = array(
			'scheduleid'	=> NULL,
			'classid'		=> $this->getClassID(),
			'lessonid'		=> $this->input->post('lessonid'),
			'day'			=> $this->input->post('day'),
			'start'			=> date("H:i", strtotime($this->input->post('start'))),
			'end'			=> date("H:i", strtotime($this->input->post('end')))
		);
		$this->db->insert('schedule', $object);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}
/* End of file Class_model.php */
/* Location: ./application/models/Class_model.php */