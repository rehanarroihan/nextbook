<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once APPPATH."libraries/PHPMailer/PHPMailerAutoload.php";
class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Auth_model');
		$this->load->library('google');
		$this->load->library('facebook');
	}

	public function index(){
		redirect('auth/login');
	}

	public function login(){
		if($this->session->userdata('auth') == true){
			redirect('aclass?page=main');
		}else{
			if($this->input->get('code')){
				$this->facebook->destroy_session();

	            //authenticate user
	            $this->google->getAuthenticate();
	            
	            //get user info from google
	            $gpInfo = $this->google->getUserInfo();
	            
	            //preparing data for database insertion
	            $userData['oauth_provider'] = 'google';
	            $userData['oauth_uid']      = $gpInfo['id'];
	            $userData['dspname'] 	    = $gpInfo['given_name']." ".$gpInfo['family_name'];
	            $userData['email']          = $gpInfo['email'];
	            $userData['status']			= 'verified';
	            $userData['gender']         = $gpInfo['gender'];
	            $userData['locale']         = $gpInfo['locale'];
	            $userData['profile_url']    = $gpInfo['link'];
	            $userData['picture_url']    = $gpInfo['picture'];
	            
		    	//insert or update user data to the database
		        $userID = $this->Auth_model->checkUser_google($userData);

		        //store status & user info in session
	        	$data['userData'] = $userData;
	        	$this->session->set_userdata('loggedIn', true);
		        $this->session->set_userdata('userData', $userData);
		        $this->session->set_userdata('auth') == true;

		        //redirect to profile page
		        redirect('aclass');
	        }elseif($this->facebook->is_authenticated()){
	        	$this->facebook->destroy_session();
	            // Get user facebook profile details
	            $userProfile = $this->facebook->request('get','/me?fields=id,first_name,last_name,email,gender,locale,picture');

	            // Preparing data for database insertion
	            $userData['oauth_provider'] = 'facebook';
	            $userData['oauth_id'] 		= $userProfile['id'];
	            $userData['dspname']	 	= $userProfile['first_name']." ".$userProfile['last_name'];
	            if (!isset($userProfile['email'])) {
	            	$userData['email'] 			= 'N/A';
	            }else{
	            	$userData['email'] 			= $userProfile['email'];
	            }
	            $userData['gender']			= $userProfile['gender'];
	            $userData['locale'] 		= $userProfile['locale'];
	            $userData['status']			= 'virified';
	            $userData['profile_url'] 	= 'https://www.facebook.com/'.$userProfile['id'];
	            $userData['picture_url'] 	= $userProfile['picture']['data']['url'];

	            // Insert or update user data
	            $userID = $this->Auth_model->checkUser_facebook($userData);

	            // Check user data insert or update status
	            $data['userData'] = $userData;
	            $this->session->set_userdata('loggedIn', true);
	            $this->session->set_userdata('userData',$userData);

	            // Get logout URL
	            $data['logoutUrl'] = $this->facebook->logout_url();
	            redirect('aclass');
	        }

	        $data['authUrl'] =  $this->facebook->login_url();
	        $data['loginURL'] = $this->google->loginURL();
			$this->load->view('auth/login_view',$data);
		}
	}

	public function register(){
		if($this->session->userdata('auth') == true){
			redirect('aclass');
		}
		$this->load->view('auth/register_view');
	}

	public function logins(){
		if($this->input->post('logins')){
			$this->form_validation->set_rules('login', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == true) {
				if($this->Auth_model->loginVal() == true){
					if($this->Auth_model->getStatus($this->input->post('login')) == true){
						redirect('aclass');
					}else{
						$this->session->set_flashdata('announce', 'Please check your email for verification');
						redirect('auth/login');
					}
				}else{
					$this->session->set_flashdata('announce', 'Invalid username or password');
					redirect('auth/login?usr='.$this->input->post('login'));
				}
			} else {
				$this->session->set_flashdata('announce', validation_errors());
				redirect('auth/login');
			}
		}else{
			redirect('auth/logina');
		}
	}

	public function loging(){
		if($this->Auth_model->loginVal() == true){
			if($this->Auth_model->getStatus($this->input->post('login')) == true){
				echo '2';
			}else{
				echo '1';
			}
		}else{
			echo '0';
		}
	}

	public function logout(){
		$this->facebook->destroy_session();
		$this->session->sess_destroy();
		redirect('auth');
	}

	public function registers(){
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
					        $mail->SetFrom('noreply@nextbook.cf', 'Nextbook Team');     
					        $mail->Subject    = "Account confirmation - Nextbook";
					        $ml['usern']	= $this->input->post('fullname');
					        $ml['link']		= $link;
					        $mail->Body      = $this->load->view('auth/email_verification', $ml, true);
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
								//echo "Error: " . $mail->ErrorInfo;
								//echo $this->email->print_debugger();
								$this->session->set_flashdata('announce', 'Something went wrong, please try again later 2');
								redirect('auth/register');
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
		$this->load->view('auth/complete_view');
	}

	public function confirm(){
		$username = $this->uri->segment(3);
		if($this->uri->segment(4) != ''){
			if($this->uri->segment(4) == md5($username)) {
				if($this->Auth_model->usernameCheck($username) == false) {
					if($this->Auth_model->checkStatus($username) == true) {
						if($this->Auth_model->activation($username) == true) {
							$this->load->view('auth/confirm_view');
						}else{
							echo 'something went wrong';
						}
					}else{
						$this->load->view('errors/404_view');
					}
				}else{
					$this->load->view('errors/404_view');
				}
			}else{
				$this->load->view('errors/404_view');
			}
		}else{
			$this->load->view('errors/404_view');
		}
	}

	public function fun(){
		$this->load->view('auth/email');
	}

	public function forgot(){
		if($this->session->userdata('auth') == true){
			redirect('aclass?page=main');
		}
		$this->load->view('auth/forgot_view');
	}

	public function forgots(){
		$token = $this->Auth_model->generate32key();
		if($this->input->post('forgot')){
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			if($this->form_validation->run() == true){
				$email = $this->input->post('email');
				$dspname = $this->Auth_model->getDSPfromEmail($email);
				if($this->Auth_model->emailCheck($email) == false){
					$link = base_url().'auth/'.'reset/'.$token;
					$mail = new PHPMailer();
					$mail->IsSMTP();
       				$mail->SMTPAuth   = true;
       				$mail->SMTPSecure = "ssl";
			        $mail->Host       = "mail.nextbook.cf";
				    $mail->Port       = 465;
				    $mail->Username   = "noreply@nextbook.cf";
			        $mail->Password   = "nextbook4321";
				    $mail->SetFrom('noreply@nextbook.cf', 'Nextbook Support');
				    $mail->Subject    = "Password Reset - Nextbook";
			        $ml['usern']	= $this->Auth_model->getUSRfromEmail($email);
				    $ml['link']		= $link;
				    $mail->Body      = $this->load->view('auth/email_forgot', $ml, true);
				    $mail->IsHTML(true);
				    $mail->addAddress($email, $dspname);
					if($mail->Send()){
						if($this->Auth_model->reqChangePass($email, $token) == true){
							$this->session->set_flashdata('announce', 'Silahkan cek email anda, link sudah kami kirimkan');
							redirect('auth/forgot');
						}else{
							$this->session->set_flashdata('announce', 'Something went wrong, please try again later');
							redirect('auth/forgot');
						}
					}else{
						//echo "Error: " . $mail->ErrorInfo;
						//echo $this->email->print_debugger();
						$this->session->set_flashdata('announce', 'Something went wrong, please try again later');
						redirect('auth/forgot');
					}					
				}else{
					$this->session->set_flashdata('announce', 'Email not registered');
					redirect('auth/forgot');
				}
			}else{
				$this->session->set_flashdata('announce', 'Please provide a valid email address');
				redirect('auth/forgot');
			}
		}else{
			redirect('auth');
		}		
	}

	public function reset(){
		$token = $this->uri->segment(3);
		if($this->Auth_model->checkToken($token) == true){
			if($this->Auth_model->checkPassStatus($token) == true){
				$this->load->view('auth/reset_view');
			}else{
				$this->load->view('errors/404_view');
			}
		}else{
			$this->load->view('errors/404_view');
		}
	}

	public function resets(){
		$empat = $this->input->post('token');
		if($this->input->post('reset')){
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
			if ($this->form_validation->run() == true){
				$pass = $this->input->post('password');
				$cpass = $this->input->post('cpassword');
				if($pass == $cpass){
					if($this->Auth_model->goReset() == true){
						$this->session->set_flashdata('announce', 'Reset password success');
						redirect('auth/login');
					}else{
						$this->session->set_flashdata('announce', 'An error occurred, please try again later');
						redirect('auth/reset/'.$empat);
					}
				}else{
					$this->session->set_flashdata('announce', 'Password doesnt match');
					redirect('auth/reset/'.$empat); 
				}	
			}else{
				$this->session->set_flashdata('announce', validation_errors());
				redirect('auth/reset/'.$empat);
			}
		}else{
			redirect('auth');
		}
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */