<?php

	defined('BASEPATH') or die;

	class Receiver extends CI_Controller
	{

		function __construct() {
			parent::__construct();
		}

		function signin() {
			if($_SERVER['REQUEST_METHOD'] === "POST") {
				$this->load->view('components/receiver/signup_form');
				return;
			}
			$this->load->view('receiver/signin');
		}

	}