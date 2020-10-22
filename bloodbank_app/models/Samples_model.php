<?php

	defined('BASEPATH') or die;

	class Samples_model extends CI_Model
	{

		# Get all blood samples (with hospital), return object array containing samples details
		function getAll() {
			return $this->db->select("sample_id, sample_type, sample_rhd, hospital_feature_image, sample_name, hospital_name, hospital_address, '0' as status")
							->join('hospital', 'hospital.hospital_id=blood_sample.hospital_id')
							->order_by('sample_type')
							->get('blood_sample')
							->result();
		}

		# Get all available blood samples count, returns an integer
		function getAllCount() {
			return $this->db->get('blood_sample')->num_rows();
		}

		# Add a new blood sample, returns boolean for insertion success
		function add($hospital_id, $name, $type, $rhd) {
			$data = array(
				'hospital_id' => $hospital_id,
				'sample_name' => $name,
				'sample_type' => $type,
				'sample_rhd' => $rhd,
				'date_added' => date('Y-m-d H:i:s')
			);
			return $this->db->insert('blood_sample', $data);
		}

		function getAllByHospital($hospital_id) {
			return $this->db->where('hospital_id', $hospital_id)
							->get('blood_sample')
							->result();
		}

		function getAllWithStatus($receiver_id) {
			$sub_query = "SELECT COUNT(*) FROM blood_request_tracker WHERE blood_request_tracker.sample_id=blood_sample.sample_id AND blood_request_tracker.receiver_id='".$this->session->kp_receiver."'";
			return $this->db->select("sample_id, sample_type, sample_rhd, hospital_feature_image, sample_name, hospital_name, hospital_address, ($sub_query) as status")
							->join('hospital', 'hospital.hospital_id=blood_sample.hospital_id')
							->order_by('sample_type')
							->get('blood_sample')
							->result();
		}

	}