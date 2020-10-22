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

		function requestBloodPage() {
			$this->load->model('Samples_model');
			$this->load->model('Request_model');
			if($_SERVER['REQUEST_METHOD'] === "POST") {
				if($this->session->kp_receiver == null and $this->session->kp_hospital == null) {
					echo "0";
				} else if($this->session->kp_receiver == null) {
					echo "1";
				} else {
					$success = $this->Request_model->apply($this->session->kp_receiver, $this->input->post('sample_id'));
					if($success) {
						echo "2";
					} else {
						echo "idk";
					}
				}
				return;
			}
			if($this->session->kp_receiver == null) {
				$data['samples'] = $this->Samples_model->getAll();
			} else {
				$data['samples'] = $this->Samples_model->getAllWithStatus($this->session->kp_receiver);
			}
			$this->load->view('request_blood', $data);
		}

		function signout() {
			session_destroy();
			redirect('/');
		}

	}
