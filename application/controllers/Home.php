<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Home_model');
		if($this->session->userdata('auth') == false){
			redirect('auth');
		}
	}

	public function index(){
		if($this->Home_model->getCardCount() == true){
			$data['title'] = 'Home';
			$data['primary_view'] = 'card/main_card_view';
			$data['getList'] = $this->Home_model->getCardList();
		}else{
			$data['primary_view'] = 'card/no_card_view';
		}
		$this->load->view('main_view', $data);
	}

	public function createcard(){
		if($this->input->post('card')){
			if($this->Home_model->createcard() == true){
				$this->session->set_flashdata('announce', 'Card created');
				redirect('home');
			}else{
				$this->session->set_flashdata('announce', 'An error occurred');
				redirect('home');
			}
		}else{
			redirect('home');
		}
	}

	public function savecard(){
		if($this->input->post('savecard')){
			if($this->Home_model->savecard($this->input->post('cid')) == true){
				$this->session->set_flashdata('announce', 'Changes saved');
				redirect('home');
			}else{
				$this->session->set_flashdata('announce', 'An error occurred');
				redirect('home');
			}
		}else{
			redirect('home');
		}
	}

	public function trash(){
		$cid = $this->input->get('cid');
		if($this->Home_model->deleteCard($cid) == true){
			$this->session->set_flashdata('announce', 'Card deleted');
			redirect('home');
		}else{
			$this->session->set_flashdata('announce', 'An error occurred');
			redirect('home');
		}
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
