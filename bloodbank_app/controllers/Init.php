<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Init extends CI_Controller
	{

		function index() {
			$this->load->model('Samples_model');
			$this->load->model('Hospital_model');
			$this->load->model('Request_model');

			$data['samples_count'] = $this->Samples_model->getAllCount();
			$data['hospitals_count'] = $this->Hospital_model->getAllCount();
			$data['delivered'] = $this->Request_model->getAllCount();

			$data['hospitals'] = $this->Hospital_model->getLast(3);
			
			$this->load->view('home', $data);
		}

		function signout() {
			session_destroy();
			redirect('/');
		}

	}
