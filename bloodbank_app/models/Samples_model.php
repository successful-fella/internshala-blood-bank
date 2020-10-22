<?php

	defined('BASEPATH') or die;

	class Samples_model extends CI_Model
	{

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

	}