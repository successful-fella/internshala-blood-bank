<?php

	defined('BASEPATH') or die;

	class Receiver extends CI_Controller
	{

		function __construct() {
			parent::__construct();
			$this->load->model('Receiver_model');
		}


		############### Signin Page Functions ######################

		private function signinNext() {
			$email = $this->input->post('email');
			if($this->Receiver_model->emailExists($email)) {
				$this->load->view('components/receiver/signin_form');
			} else {
				$this->load->view( 'components/receiver/signup_form', array('email' => $email) );
			}
		}

		private function actualSignin() {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			if($this->Receiver_model->verify($email, $password)) {
				echo "1";
			} else {
				echo "0";
			}
		}

		private function signUp() {
			$success = $this->Receiver_model->signUp();
			if($success) {
				http_response_code(200);
			} else {
				http_response_code(500);
			}
		}

		function signin() {
			if($_SERVER['REQUEST_METHOD'] === "POST") {
				switch($this->input->post('action')) {
					case 'next':
						$this->signinNext();
						break;
					case 'signin':
						$this->actualSignin();
						break;
					case 'signup':
						$this->signUp();
						break;
				}
				return;
			}
			if($this->Receiver_model->signedIn()) {
				redirect('/');
				return;
			}
			$this->load->view('receiver/signin');
		}

		############### END Signin Page Functions #############

	}