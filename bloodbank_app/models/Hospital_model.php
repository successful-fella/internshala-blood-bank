<?php

	defined('BASEPATH') or die;

	class Hospital_model extends CI_Model
	{

		# Checks if user is already signed in? Return boolean
		function signedIn() {
			if($this->session->kp_hospital == null) {
				return false;
			} else {
				return true;
			}
		}

		# Checks if email is already available in database, returns boolean
		function emailExists($email) {
			$email = strip_tags($email);
			$query = $this->db->where('hospital_contact_email', $email)
							->get('hospital');
			if($query->num_rows()) {
				# Okay exists
				return true;
			} else {
				# Nope
				return false;
			}
		}

		# Verified is user trying to sign in is valid. Returns boolean
		function verify($email, $password) {
			$hospital = $this->db->where('hospital_contact_email', $email)
							->get('hospital')
							->row();
			if(empty($hospital)) {
				return false;
			} else {
				$password_hash = $hospital->hospital_password;
				if(password_verify($password, $password_hash)) {
					session_destroy();
					$this->session->set_userdata('kp_hospital', $hospital->hospital_id);
					$this->session->set_userdata('kp_hospital_name', $hospital->hospital_name);
					return true;
				} else {
					return false;
				}
			}
		}

		# Sign user up with POST received, returns boolean as per insertion success.
		function signUp() {
			$image_file = "";
			if(!empty($_FILES['file']['name'])) {
				$image_file = $this->uploadImage();
			}
			$data = array(
				'hospital_name' => strip_tags($this->input->post('name')),
				'hospital_address' => strip_tags($this->input->post('address')),
				'hospital_contact_email' => strip_tags($this->input->post('email')),
				'hospital_feature_image' => empty($image_file) ? '':$image_file,
				'hospital_password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'date_added' => date('Y-m-d H:i:s')
			);
			$success = $this->db->insert('hospital', $data);
			if($success) {
				# Temprorary session, I can set permanent using Cookies.
				session_destroy();
				$this->session->set_userdata('kp_hospital', $this->db->insert_id());
				$this->session->set_userdata('kp_hospital_name', $data['hospital_name']);
			}
			return $success;
		}

		# Gets last entered hospitals data by $how_many results. Returns object array
		function getLast($how_many = 5) {
			return $this->db->order_by('hospital_id', 'DESC')
							->get('hospital')
							->result();
		}

		# Fetch numbers of hospitals, returns an integer
		function getAllCount() {
			return $this->db->get('hospital')->num_rows();
		}

		# Uploads hospital image and return save location or false if image not uploaded.
		function uploadImage() {
			$file_name = "file";
			$max_size = 10000000;
			$location = 'uploads/hospital';

			$allowed_ext = array('png', 'jpg', 'jpeg', 'gif');
			$allowed_mime = array('image/png', 'image/jpeg', 'image/pjpeg', 'image/gif');
			$ext = pathinfo($_FILES[$file_name]['name'], PATHINFO_EXTENSION);
			if ((in_array(strtolower($ext), $allowed_ext)) && ($_FILES[$file_name]['size'] <= $max_size)) {
				$md5 = md5_file($_FILES[$file_name]['tmp_name']);
				$newname = $md5.'.'.$ext;
				move_uploaded_file($_FILES[$file_name]['tmp_name'], __DIR__.'/../../'.$location.'/'.$newname);
				return $location.'/'.$newname;
			} else {
				echo "0";
				die;
			}
		}

	}