<?php

	defined('BASEPATH') or die;

	class Receiver_model extends CI_Model
	{

		# Checks if user is already signed in? Return boolean
		function signedIn() {
			if($this->session->kp_receiver == null) {
				return false;
			} else {
				return true;
			}
		}

		# Checks if email is already available in database, returns boolean
		function emailExists($email) {
			$email = strip_tags($email);
			$query = $this->db->where('receiver_contact_email', $email)
							->get('receiver');
			if($query->num_rows()) {
				# Okay exists
				return true;
			} else {
				# Nope
				return false;
			}
		}

		# Sign user up with POST recieved, returns boolean as per insertion success.
		function signUp() {
			$data = array(
				'receiver_name' => strip_tags($this->input->post('name')),
				'receiver_address' => strip_tags($this->input->post('address')),
				'receiver_contact_email' => strip_tags($this->input->post('email')),
				'receiver_blood_type' => strip_tags($this->input->post('blood_group')),
				'receiver_blood_rhd' => strip_tags($this->input->post('blood_rhd')),
				'receiver_password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'date_added' => date('Y-m-d H:i:s')
			);
			$success = $this->db->insert('receiver', $data);
			if($success) {
				# Temprorary session, I can set permanent using Cookies.
				$this->session->set_userdata('kp_receiver', $this->db->insert_id());
				$this->session->set_userdata('kp_receiver_name', $data['receiver_name']);
			}
			return $success;
		}

		# All blood sample requested count, returns an positive integer
		function getAllRequestedCount() {
			return $this->db->get('blood_request_tracker')->num_rows();
		}

	}