<?php

	defined('BASEPATH') or die;

	class Receiver extends CI_Controller
	{

		function __construct() {
			parent::__construct();
		}


		############### Signin Page Functions ######################

		function signinNext() {
			$this->load->view('components/receiver/signup_form');
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
						break;
				}
				return;
			}
			$this->load->view('receiver/signin');
		}

		############### END Signin Page Functions #############

	}