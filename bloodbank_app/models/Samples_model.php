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

		# Get all samples by given hospital id, returns object array
		function getAllByHospital($hospital_id) {
			return $this->db->where('hospital_id', $hospital_id)
							->get('blood_sample')
							->result();
		}

		# Get samples but with status that says if the sample is already requested, returns object array
		function getAllWithStatus($receiver_id) {
			$sub_query = "SELECT COUNT(*) FROM blood_request_tracker WHERE blood_request_tracker.sample_id=blood_sample.sample_id AND blood_request_tracker.receiver_id='".$this->session->kp_receiver."'";
			return $this->db->select("sample_id, sample_type, sample_rhd, hospital_feature_image, sample_name, hospital_name, hospital_address, ($sub_query) as status")
							->join('hospital', 'hospital.hospital_id=blood_sample.hospital_id')
							->order_by('sample_type')
							->get('blood_sample')
							->result();
		}

		# Checks for eligibility by comparing receiver blood and requested sample blood group, returns boolean
		function checkEligibility($receiver_id, $sample_id) {
			# Chart
			$O_negative = array('O-');
			$O_positive = array('O+', 'O-');
			$A_negative = array('A-', 'O-');
			$A_positive = array('A+', 'A-', 'O+', 'O-');
			$B_negative = array('B-', 'O-');
			$B_positive = array('B+', 'B-', 'O+', 'O-');
			$AB_negative = array('AB-', 'B-', 'A-', 'O-');
			$AB_positive = array('AB+', 'AB-', 'B+', 'B-', 'A+', 'A-', 'O+', 'O-');

			$receiver = $this->db->where('receiver_id', $receiver_id)
											->get('receiver')->row();
			$receiver_blood_group = $receiver->receiver_blood_type . (($receiver->receiver_blood_rhd == '+') ? '_positive':'_negative');

			$sample = $this->db->where('sample_id', $sample_id)
								->get('blood_sample')->row();
			$sample_blood_group = $sample->sample_type . $sample->sample_rhd;

			return in_array($sample_blood_group, $$receiver_blood_group);
		}

	}