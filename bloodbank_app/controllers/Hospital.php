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
						if(!empty($_FILES['file']['name'])) {
							$this->Hospital_model->uploadImage();
						}
						echo "1";
						break;
				}
				return;
			}
			$this->load->view('hospital/signin');
		}

		############### END Signin Page Functions #############

		function requestBlood() {
			$this->load->view('hospital/request_blood');
		}

	}