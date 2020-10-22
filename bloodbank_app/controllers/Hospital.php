<?php

	defined('BASEPATH') or die;

	class Hospital extends CI_Controller
	{

		function __construct() {
			parent::__construct();
			$this->load->model('Hospital_model');
		}


		############### Signin Page Functions ######################

		function signinNext() {
			$email = $this->input->post('email');
			if($this->Hospital_model->emailExists($email)) {
				$this->load->view('components/hospital/signin_form');
			} else {
				$this->load->view( 'components/hospital/signup_form', array('email' => $email) );
			}
		}

		function actualSignin() {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			if($this->Hospital_model->verify($email, $password)) {
				echo "1";
			} else {
				echo "0";
			}
		}

		function signup() {
			$success = $this->Hospital_model->signup($image_file);
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
			if($this->Hospital_model->signedIn()) {
				redirect('hospital/dashboard');
				return;
			}
			session_destroy();
			$this->load->view('hospital/signin');
		}

		############### END Signin Page Functions #############


		#################### Dashboard #######################

		private function listBloodSamples() {
			$this->load->model('Samples_model');
			$data['samples'] = $this->Samples_model->getAllByHospital($this->session->kp_hospital);
			$this->load->view('components/hospital/ajax_blood_sample_list', $data);
		}

		private function listRequest() {
			$this->load->model('Request_model');
			$data['requests'] = $this->Request_model->getAllByHospital($this->session->kp_hospital);
			$this->load->view('components/hospital/ajax_blood_sample_requests', $data);
		}

		private function addBloodSample() {
			$hospital_id = $this->session->kp_hospital;
			$name = strip_tags($this->input->post('title'));
			$type = strip_tags($this->input->post('type'));
			$rhd = strip_tags($this->input->post('rhd'));
			$this->load->model('Samples_model');
			$success = $this->Samples_model->add($hospital_id, $name, $type, $rhd);
			echo ($success) ? '1':'0';
		}

		function dashboard() {
			if(!$this->Hospital_model->signedIn()) {
				redirect('sign-in/hospital');
				return;
			}
			if($_SERVER['REQUEST_METHOD'] === "POST") {
				switch ($this->input->post('action')) {
					case 'list':
						$this->listBloodSamples();
						break;
					case 'requests':
						$this->listRequest();
						break;
					case 'add':
						$this->addBloodSample();
						break;
				}
				return;
			}
			$this->load->view('hospital/dashboard');
		}

		################### END Dashboard ####################

	}