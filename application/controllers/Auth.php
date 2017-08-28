<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Auth_model');
	}

	public function index(){
		redirect('auth/login');
	}

	public function login(){
		if($this->session->userdata('auth') == true){
			redirect('home?page=main');
		}
		$this->load->view('login_view');
	}

	public function register(){
		if($this->session->userdata('auth') == true){
			redirect('home');
		}
		$this->load->view('register_view');
	}

	public function logins(){
		if($this->input->post('logins')){
			$this->form_validation->set_rules('login', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == true) {
				if($this->Auth_model->loginVal() == true){
					$username = $this->input->post('login');
					if($this->Auth_model->getStatus($username) == true){
						redirect('home');
					}else{
						$this->session->set_flashdata('announce', 'Please check your email for verification');
						redirect('auth/login');
					}
				}else{
					$this->session->set_flashdata('announce', 'Invalid username or password');
					redirect('auth/login?crd='.$this->input->post('login'));
				}
			} else {
				$this->session->set_flashdata('announce', validation_errors());
				redirect('auth/login');
			}
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('auth');
	}

	public function registers(){
		include_once APPPATH."libraries/PHPMailer/PHPMailerAutoload.php";
		if($this->input->post('registers')){
			$this->form_validation->set_rules('fullname', 'Fullname', 'trim|required');
			$this->form_validation->set_rules('username', 'User name', 'trim|required|min_length[4]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('cpassword', 'Password', 'trim|required');

			//Generate link
			$lk1 = md5($this->input->post('username'));
			$link = base_url().'auth/'.'confirm/'.$this->input->post('username').'/'.$lk1;

			if($this->form_validation->run() == true) {
				if($this->input->post('password') == $this->input->post('cpassword')){
					if($this->Auth_model->emailCheck($this->input->post('email')) == true){
						if($this->Auth_model->usernameCheck($this->input->post('username')) == true){
							$mail = new PHPMailer();
							$mail->IsSMTP();
        					$mail->SMTPAuth   = true;
        					$mail->SMTPSecure = "ssl";
					        $mail->Host       = "mail.nextbook.cf";
					        $mail->Port       = 465;
					        $mail->Username   = "noreply@nextbook.cf";
					        $mail->Password   = "nextbook4321";
					        $mail->SetFrom('noreply@nextbook.cf', 'Nextbook Support');     
					        $mail->Subject    = "Account confirmation - Nextbook";
					        $ml['usern']	= $this->input->post('fullname');
					        $ml['link']		= $link;
					        $mail->Body      = $this->load->view('email_verification', $ml, true);
					        $mail->IsHTML(true);
					        $mail->addAddress($this->input->post('email'), $this->input->post('fullname'));
							if($mail->Send()){
								if($this->Auth_model->regVal() == true){
									$bre = md5($this->input->post('email'));
									redirect('auth/complete?mail='.$this->input->post('email').'&uname='.$this->input->post('username'));
								}else{
									$this->session->set_flashdata('announce', 'Something went wrong, please try again later 1');
									redirect('auth/register');
								}
							}else{
								echo "Error: " . $mail->ErrorInfo;
								//echo $this->email->print_debugger();
								//$this->session->set_flashdata('announce', 'Something went wrong, please try again later 2');
								//redirect('auth/register');
							}
						}else{
							$this->session->set_flashdata('announce', 'Username already registered, use another username');
							redirect('auth/register');
						}
					}else{
						$this->session->set_flashdata('announce', 'Email already registered');
						redirect('auth/register');
					}
				}else{
					$this->session->set_flashdata('announce', 'Password doesnt match');
					redirect('auth/register');
				}
			} else {
				$this->session->set_flashdata('announce', validation_errors());
				redirect('auth/register');
			}
		}else{
			redirect('auth/register');
		}
	}

	public function complete(){
		if($this->input->get('uname') == ''){
			redirect('auth/login');
		}
		$this->load->view('complete_view');
	}

	public function confirm(){
		$username = $this->uri->segment(3);
		if($this->uri->segment(4) != ''){
			if($this->uri->segment(4) == md5($username)) {
				if($this->Auth_model->usernameCheck($username) == false) {
					if($this->Auth_model->checkStatus($username) == true) {
						if($this->Auth_model->activation($username) == true) {
							$this->load->view('confirm_view');
						}else{
							echo 'something went wrong';
						}
					}else{
						$this->load->view('404_view');
					}
				}else{
					$this->load->view('404_view');
				}
			}else{
				$this->load->view('404_view');
			}
		}else{
			$this->load->view('404_view');
		}
	}

	public function recovery(){
		echo 'coming soon';
	}

	public function fun(){
		$this->load->view('email');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */