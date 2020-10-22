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
			$this->load->view('components/hospital/signup_form');
		}

		function actualSignin() {
			echo "0";
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
						$file = "";
						if(!empty($_FILES['file']['name'])) {
							$file = $this->Hospital_model->uploadImage();
						}
						echo "1";
						break;
				}
				return;
			}
			$this->load->view('hospital/signin');
		}

		############### END Signin Page Functions #############


		#################### Dashboard #######################

		function listBloodSamples() {
			$this->load->view('components/hospital/ajax_blood_sample_list');
		}

		function listRequest() {
			$this->load->view('components/hospital/ajax_blood_sample_requests');
		}

		function dashboard() {
			if($_SERVER['REQUEST_METHOD'] === "POST") {
				switch ($this->input->post('action')) {
					case 'list':
						$this->listBloodSamples();
						break;
					case 'requests':
						$this->listRequest();
						break;
				}
				return;
			}
			$this->load->view('hospital/dashboard');
		}

		################### END Dashboard ####################

	}