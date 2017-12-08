<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Card extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Card_model');
		$this->load->model('Setting_model');
		if($this->session->userdata('auth') == false){
			redirect('auth');
		}
	}

	public function index(){
		$cid = $this->uri->segment(3);
		$key = $this->uri->segment(4);
		if(!empty($cid) && !empty($key)){
			if($this->Card_model->cardAvailable($cid)){
				if($this->Card_model->isHis($cid) == true){
					if(md5($cid) == $key){
						$data['title'] = $this->Card_model->getCardDetail($cid)->card_name;
						$data['primary_view'] = 'card/card_view';
						$data['card'] = $this->Card_model->getCardDetail($cid);
						$data['valCount'] = $this->Card_model->getValCount($cid);
						$data['value'] = $this->Card_model->getValue($cid);
					}else{
						$data['primary_view'] = 'errors/404_partial_view';
					}
				}else{
					$data['primary_view'] = 'errors/404_partial_view';
				}
			}else{
				$data['primary_view'] = 'errors/404_partial_view';
			}
		}else{
			$data['primary_view'] = 'errors/404_partial_view';
		}
		$data['interface'] = $this->Setting_model->get_interface();
		$this->load->view('template_view', $data);
	}

	public function edit(){
		$cid = $this->input->post('cid');
		$data['detVal'] = $this->Card_model->getCardDetail($cid);
		$this->load->view('card/card_edit_view', $data);
	}

	public function upload(){
		$cid = $this->uri->segment(3);
		$key = $this->uri->segment(4);
		if(!empty($cid) && !empty($key)){
			if($this->Card_model->cardAvailable($cid)){
				if(md5($cid) == $key){
					$data['title'] = 'Upload to '.$this->Card_model->getCardDetail($cid)->card_name.' card';
					$data['primary_view'] = 'card/card_view';
					$data['card'] = $this->Card_model->getCardDetail($cid);
					$data['valCount'] = $this->Card_model->getValCount($cid);
				}else{
					$data['primary_view'] = 'errors/404_partial_view';
				}
			}else{
				$data['primary_view'] = 'errors/404_partial_view';
			}
		}else{
			$data['primary_view'] = 'errors/404_partial_view';
		}
		$data['interface'] = $this->Setting_model->get_interface();
		$this->load->view('template_view', $data);
	}

	public function uploads(){
		if($this->input->post('file')){
			$config['upload_path'] = './assets/user/file/';
			$config['allowed_types'] = 'gif|jpg|png|pdf';
			$config['max_size']  = '2000';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('file') == true){
				if($this->Card_model->upload($this->upload->data()) == true){
					$this->session->set_flashdata('announce', 'Upload success');
					redirect('home');
				}else{
					$this->session->set_flashdata('announce', 'Failed');
					redirect('home');
				}
			}else{
				$this->session->set_flashdata('announce', $this->upload->display_errors());
				redirect('home'); 
			}
		}
	}

	public function addlink(){
		if($this->input->post('savelink')){
			$cid = $this->input->post('card_id');
			if($this->Card_model->addLink() == true){
				$this->session->set_flashdata('announce', 'Berhasil menyimpan');
				redirect('card/index/'.$cid.'/'.md5($cid));
			}else{
				$this->session->set_flashdata('announce', 'Gagal menyimpan data');
				redirect('card/index/'.$cid.'/'.md5($cid));
			}
		}
	}
}

/* End of file Card.php */
/* Location: ./application/controllers/Card.php */
