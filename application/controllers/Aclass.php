<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Endroid\QrCode\QrCode;
require APPPATH .'libraries/vendor/autoload.php';

class Aclass extends CI_Controller {	

	public function __construct(){
		parent::__construct();
		$this->load->model('Class_model');
		$this->load->model('Profile_model');
		$this->load->model('Setting_model');
		if($this->session->userdata('auth') == false){
			redirect('auth');
		}
	}

	public function index(){
		// if($this->Class_model->isHave() == true){
		// 	$data['primary_view'] = 'class/class_view';
		// 	//$data['isadmin'] = $this->Class_model->isAdmin();
		// 	$data['classdata'] = $this->Class_model->getClassData();
		// 	$data['memberlist'] = $this->Class_model->memberList();
		// }else{
		// 	$data['primary_view'] = 'class/no_class_view';
		// }
		// $data['interface'] = $this->Setting_model->get_interface();
		// $data['detail'] = $this->Profile_model->getProfileDetail();
		// $this->load->view('template_view', $data);
		redirect('aclass/home');
	}

	public function lesson()
	{
		if($this->uri->segment(4) != ''){
			$lessonid = $this->uri->segment(3);

			if ($this->input->get('search') != null) {
				$search = $this->input->get('search');
				$data['postlesson'] = $this->Class_model->getLessonPostSearch($lessonid,$search);
				$data['bsearch'] = $this->input->get('search');
			} else {
				$data['postlesson'] = $this->Class_model->getLessonPost($lessonid);
			}
			
			$data['allowsearch'] = 'lesson';
			$data['title'] = 'Lesson';
			$data['primary_view'] = 'class/lesson_view';
			$data['detail'] = $this->Profile_model->getProfileDetail();
			$data['interface'] = $this->Setting_model->get_interface();
			$data['less'] = $this->Class_model->getLesson($lessonid);
			$data['classdata'] = $this->Class_model->getClassData();
			$data['third_view'] = 'class/home_view';
			$data['memberlist'] = $this->Class_model->memberList();
			$this->load->view('template_view', $data);
		} else {
			$this->load->view('errors/404_view');
		}
	}

	public function createclass(){
		if($this->input->post('class')){
			if($this->Class_model->insert()  == true){
				$this->session->set_flashdata('announce', 'Class created');
				redirect('aclass');
			}else{
				$this->session->set_flashdata('announce', 'an error ocurred');
				redirect('aclass');
			}
		}
	}

	public function unenroll(){
		if($this->Class_model->isHave() == true){
			if($this->Class_model->unenroll() == true){
				$this->session->set_flashdata('announce', 'You unenroll a class');
				redirect('aclass');
			}else{
				$this->session->set_flashdata('announce', 'Error');
				redirect('aclass');
			}
		}else{
			
		}
	}

	public function checkcode(){
		$code = $this->input->post('code');
		if(!empty($code)){
			$check = $this->db->where('classid', $code)->get('class');
			if($check->num_rows() > 0){
				//Iki nek berhasil
				if($this->Class_model->join($code) == true){
					echo "1";
				}
			}else{
				echo "2";
			}
		}else{
			$this->load->view('errors/404_view');
		}
	}

	public function genqr(){
		$classid = $this->uri->segment(3);
		$size = $this->uri->segment(4);
		header('Content-Type: image/png');
		$qr = new QrCode($classid); 
		$qr->setSize($size);
		echo $qr->writeString();
	}

	public function executesetting()
	{
		$config['upload_path'] = './assets/2.0/img/group/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = 2000;
		
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('classpict')){
			$ident = '';
			if ($this->Class_model->setting($this->upload->data(),$ident) == TRUE) {
				$this->session->set_flashdata('announce', 'Group Setting Success to Update');
				redirect('aclass/setting');
			} else {
				$this->session->set_flashdata('announce', 'Group Setting Failed to Update');
				redirect('aclass/setting');
			}
		} else {
			$foto = '';
			$ident = $this->Class_model->getClassData()->photo;
			if ($this->Class_model->setting($foto,$ident)) {
				$this->session->set_flashdata('announce', 'Group Setting Success to Update');
				redirect('aclass/setting');
			} else {
				$this->session->set_flashdata('announce', $this->upload->display_errors());
				redirect('aclass/setting');
			}
		}
	}

	public function savelesson(){
		if($this->input->post('save')){
			if($this->Class_model->saveLesson()){
				$this->session->set_flashdata('announce', 'Berhasil menyimpan');
				redirect('aclass/schedule');
			}else{
				$this->session->set_flashdata('announce', 'an error ocurred');
				redirect('aclass/schedule');
			}
		}else{
			$this->load->view('errors/404_view');
		}
	}

	//Dimensi lain
	public function home(){
		if (count($this->Class_model->getLessonNow()) > 0) {
			$data['lesson'] = $this->Class_model->getLessonNow()->lesson;
			$data['lessonnowid'] = $this->Class_model->getLessonNow()->lessonid;
		}else{
			$data['lesson'] = 'Tidak Ada';
			$data['lessonnowid'] = 0;
		}

		if (count($this->Class_model->getNextLesson()) > 0) {
			$data['nextlesson'] = $this->Class_model->getNextLesson()->lesson;
			$data['nextlessonTime'] = $this->Class_model->getNextLesson()->start;
		}else{
			$data['nextlesson'] = 'Tidak Ada';
			$data['nextlessonTime'] = "";
		}

		$data['lessonpick'] = $this->Class_model->getLessonList();

		$data['interface'] = $this->Setting_model->get_interface();
		$data['detail'] = $this->Profile_model->getProfileDetail();

		// $value = $this->input->post('fckisrael');

		// print_r($value);

		if($this->input->post('fckisrael')){
			if ($this->input->post('search') != null) {
				$data['upost'] = $this->Class_model->getUpostSearch($this->input->post('search'));
				//print_r($this->input->post('search'));
			} else {
				$data['upost'] = $this->Class_model->getUpost();
			}
			$data['classdata'] = $this->Class_model->getClassData();
			$this->load->view('class/home_view',$data);
		}else{
			if($this->Class_model->isHave() == true){
				$data['bsearch'] = $this->input->get('search');
				$data['primary_view'] = 'class/class_view';
				$data['classdata'] = $this->Class_model->getClassData();
				$data['third_view'] = 'home';
				$data['memberlist'] = $this->Class_model->memberList();
				$data['allowsearch'] = 'class';
			}else{
				$data['primary_view'] = 'class/no_class_view';
			}
			$this->load->view('template_view', $data);
		}
	}

	public function member(){
		$data['allowsearch'] = 'class';
		if($this->input->post('fckisrael')){
			$data['memberlist'] = $this->Class_model->memberList();
			$data['classdata'] = $this->Class_model->getClassData();
			$this->load->view('class/member_view', $data);
		}else{
			if($this->Class_model->isHave() == true){
				$data['primary_view'] = 'class/class_view';
				$data['classdata'] = $this->Class_model->getClassData();
				$data['third_view'] = 'member';
				$data['memberlist'] = $this->Class_model->memberList();
			}else{
				$data['primary_view'] = 'class/no_class_view';
			}
			$data['interface'] = $this->Setting_model->get_interface();
			$data['detail'] = $this->Profile_model->getProfileDetail();
			$this->load->view('template_view', $data);
		}
	}

	public function kickmember(){
		$uid = $this->input->get('uid');
		if(!empty($uid)){
			if($this->Class_model->kickMember($uid)){
				$this->session->set_flashdata('announce', 'Berhasil mengeluarkan anggota');
				redirect('aclass/member');
			}else{
				$this->session->set_flashdata('announce', 'Gagal melakukan operasi pengeluaran');
				redirect('aclass/member');
			}
		}else{
			$this->load->view('errors/404_view');
		}
	}

	public function makeadmin(){
		$uid = $this->input->get('uid');
		$classid = $this->input->get('classid');
		if(!empty($uid)){
			if($this->Class_model->makeAdmin($uid, $classid)){
				$this->session->set_flashdata('announce', 'Berhasil memberikan admin');
				redirect('aclass/member');
			}else{
				$this->session->set_flashdata('announce', 'Gagal menjalankan perintah');
				redirect('aclass/member');
			}
		}else{
			$this->load->view('errors/404_view');
		}
	}

	public function schedule(){
		$data = array(
				'memberlist'	=> $this->Class_model->memberList(),
				'classdata'		=> $this->Class_model->getClassData(),
				'seninList'		=> $this->Class_model->getDayList('senin'),
				'seninCount'	=> $this->Class_model->getDayCount('senin'),
				'selasaList'	=> $this->Class_model->getDayList('selasa'),
				'selasaCount'	=> $this->Class_model->getDayCount('selasa'),
				'rabuList'		=> $this->Class_model->getDayList('rabu'),
				'rabuCount'		=> $this->Class_model->getDayCount('rabu'),
				'kamisList'		=> $this->Class_model->getDayList('kamis'),
				'kamisCount'	=> $this->Class_model->getDayCount('kamis'),
				'jumatList'		=> $this->Class_model->getDayList('jumat'),
				'jumatCount'	=> $this->Class_model->getDayCount('jumat'),
				'sabtuList'		=> $this->Class_model->getDayList('sabtu'),
				'sabtuCount'	=> $this->Class_model->getDayCount('sabtu'),
				'mingguList'	=> $this->Class_model->getDayList('minggu'),
				'mingguCount'	=> $this->Class_model->getDayCount('minggu'),
				'lessonCount'	=> $this->Class_model->getLessonCount(),
				'lessonList'	=> $this->Class_model->getLessonList(),
			);
		$data['allowsearch'] = 'class';

		if($this->input->post('fckisrael')){
			$this->load->view('class/schedule_view', $data);
		}else{
			if($this->Class_model->isHave() == true){
				$data['primary_view'] = 'class/class_view';
				$data['third_view'] = 'schedule';
				$data['classdata'] = $this->Class_model->getClassData();
				$data['memberlist'] = $this->Class_model->memberList();
			}else{
				$data['primary_view'] = 'class/no_class_view';
			}
			$data['interface'] = $this->Setting_model->get_interface();
			$data['detail'] = $this->Profile_model->getProfileDetail();
			$this->load->view('template_view', $data);
		}
	}

	public function addchedule(){
		if($this->input->post('day')){
			$data['lessonList'] = $this->Class_model->getLessonList();
			$this->load->view('class/add_schedule_view', $data);
		}else{
			$this->load->view('errors/404_view');
		}
	}

	public function editchedule(){
		$scheid = $this->input->post('scheid');
		if(!empty($scheid)){
			$data['lessonList'] = $this->Class_model->getLessonList();
			$data['row'] = $this->Class_model->getScheduleRow($scheid);
			$this->load->view('class/edit_schedule_view', $data);
		}else{
			$this->load->view('errors/404_view');
		}
	}

	public function goeditsche(){
		if($this->input->post('goedit')){
			if($this->Class_model->goEditSchedule()){
				$this->session->set_flashdata('announce', 'Berhasil memperbarui data');
				redirect('aclass/schedule');
			}else{
				$this->session->set_flashdata('announce', 'Gagal memperbarui data');
				redirect('aclass/schedule');
			}
		}else{
			$this->load->view('errors/404_view');
		}
	}

	public function deletesche(){
		if($this->input->get('scheid')){
			$this->db->where('scheduleid', $this->input->get('scheid'))->delete('schedule');
			if($this->db->affected_rows() > 0){
				$this->session->set_flashdata('announce', 'Berhasil menghapus data');
				redirect('aclass/schedule');
			}else{
				$this->session->set_flashdata('announce', 'Gagal menghapus data');
				redirect('aclass/schedule');
			}
		}else{
			$this->load->view('errors/404_view');
		}
	}

	public function saveschedule(){
		if($this->input->post('lesson')){
			if($this->Class_model->saveSchedule()){
				$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
				redirect('aclass/schedule');
			}else{
				$this->session->set_flashdata('announce', 'Gagal menyimpan data');
				redirect('aclass/schedule');
			}
		}else{
			$this->load->view('errors/404_view');
		}
	}

	public function saveposting()
	{
		// Image Upload
		$configpict = array();
		$configpict['upload_path'] = './assets/2.0/file/img/';
		$configpict['allowed_types'] = 'gif|jpg|png';
		$configpict['max_size'] = '100000';
		$this->load->library('upload',$configpict, 'imageupload');
		$this->imageupload->initialize($configpict);
		$uploadimage = $this->imageupload->do_upload('postpict');

		// Document Upload
		$configdoc = array();
		$configdoc['upload_path'] = './assets/2.0/file/doc/';
		$configdoc['allowed_types'] = 'txt|doc|docx|ppt|pptx|xls|xlsx|pdf|zip|rar';
		$configdoc['max_size'] = '300000';
		$this->load->library('upload', $configdoc, 'documentupload');
		$this->documentupload->initialize($configdoc);
		$uploaddocument = $this->documentupload->do_upload('postfile');

		if ($this->input->post('content') != NULL) {
			if ($uploadimage) {
				if ($uploaddocument) {
					$imagedata = $this->imageupload->data();
					$documentdata = $this->documentupload->data();
					if ($this->Class_model->posting($imagedata,$documentdata) == TRUE) {
						$this->session->set_flashdata('announce', 'Success to Upload');
						redirect('aclass/home');
					}
				}else{
					$documentdata = 'NULL';
					$imagedata = $this->imageupload->data();
					if ($this->Class_model->posting($imagedata,$documentdata) == TRUE) {
						$this->session->set_flashdata('announce', 'Success to Upload');
						redirect('aclass/home');
					}
				}
			}elseif($uploaddocument){
				$imagedata = 'NULL';
				$documentdata = $this->documentupload->data();
				if ($this->Class_model->posting($imagedata,$documentdata) == TRUE) {
					$this->session->set_flashdata('announce', 'Success to Upload');
					redirect('aclass/home');
				}
			}else{
				$imagedata = 'NULL';
				$documentdata = 'NULL';
				if ($this->Class_model->posting($imagedata,$documentdata) == TRUE) {
					$this->session->set_flashdata('announce', 'Success to Upload');
					redirect('aclass/home');
				}
			}
		} elseif($uploadimage) {
			if ($uploaddocument) {
				$imagedata = $this->imageupload->data();
				$documentdata = $this->documentupload->data();
				if ($this->Class_model->posting($imagedata,$documentdata) == TRUE) {
					$this->session->set_flashdata('announce', 'Success to Upload');
					redirect('aclass/home');
				}
			}else{
				$documentdata = 'NULL';
				$imagedata = $this->imageupload->data();
				if ($this->Class_model->posting($imagedata,$documentdata) == TRUE) {
					$this->session->set_flashdata('announce', 'Success to Upload');
					redirect('aclass/home');
				}
			}
		}elseif($uploaddocument){
			$imagedata = 'NULL';
			$documentdata = $this->documentupload->data();
			if ($this->Class_model->posting($imagedata,$documentdata) == TRUE) {
				$this->session->set_flashdata('announce', 'Success to Upload');
				redirect('aclass/home');
			}
		}else{
			$this->session->set_flashdata('announce', 'Please Input Something');
			redirect('aclass/home');
		}
	}

	public function setting(){
		$data['classdata'] = $this->Class_model->getClassData();
		$data['allowsearch'] = 'class';
		if($this->input->post('fckisrael')){
			$this->load->view('class/setting_view',$data);
		}else{
			if($this->Class_model->isHave() == true){
				$data['primary_view'] = 'class/class_view';
				$data['third_view'] = 'setting';
				$data['classdata'] = $this->Class_model->getClassData();
			}else{
				$data['primary_view'] = 'class/no_class_view';
			}
			$data['interface'] = $this->Setting_model->get_interface();
	 		$data['detail'] = $this->Profile_model->getProfileDetail();
			$this->load->view('template_view', $data);
		}
	}

	public function hey(){
		$sunrise = "5:42 am";
		$sunset = "6:26 pm";
		$date1 = DateTime::createFromFormat('H:i a', date("H:i a"));
		$date2 = DateTime::createFromFormat('H:i a', $sunrise);
		$date3 = DateTime::createFromFormat('H:i a', $sunset);
		//echo 'Jam sekarang : '.date("H:i").'<br>';
		if ($date1 < $date3){
		   echo 'here';
		}
	}

	public function comment()
	{
		if ($this->Class_model->comment() == TRUE) {
			$this->session->set_flashdata('announce', 'Your Comment Was Send');
			redirect('aclass/home');
		} else {
			$this->session->set_flashdata('announce', 'Your Comment Cant Send');
			redirect('aclass/home');
		}
	}

	public function deletepost()
	{
		$postid = $this->uri->segment(3);
		if ($this->Class_model->postdelete($postid) == TRUE) {
			$this->session->set_flashdata('announce', 'Your Posting Success To Delete');
			redirect('aclass/home');
		} else {
			$this->session->set_flashdata('announce', 'Your Posting Failed To Delete');
			redirect('aclass/home');
		}
	}

	public function deletelesson()
	{
		$lessonid = $this->uri->segment(3);
		if ($this->Class_model->lessondelete($lessonid) == TRUE) {
			$this->session->set_flashdata('announce', 'Lesson Success To Delete');
			redirect('aclass/schedule');
		} else {
			$this->session->set_flashdata('announce', 'Lesson Failed To Delete');
			redirect('aclass/schedule');
		}
	}

	public function editlesson()
	{
		$code = 'l-'.rand(0,9).".".rand(11,99).".".chr(64+rand(0,25));
		if ($this->Class_model->lessonedit() == TRUE) {
			$this->session->set_flashdata('announce', 'Lesson Success To Update');
			redirect('aclass/lesson/'.$this->input->post('lessonid')."/".$code);
		} else {
			$this->session->set_flashdata('announce', 'Lesson Failed To Update');
			redirect('aclass/lesson/'.$this->input->post('lessonid')."/".$code);
		}
	}

	public function deletecomm()
	{
		$commid = $this->uri->segment(3);
		if ($this->Class_model->commdelete($commid) == TRUE) {
			$this->session->set_flashdata('announce', 'Your Comment Success To Delete');
			redirect('aclass/home');
		} else {
			$this->session->set_flashdata('announce', 'Your Comment Failed To Delete');
			redirect('aclass/home');
		}
	}
}
/* End of file Aclass.php */
/* Location: ./application/controllers/Aclass.php */