<?php

	defined('BASEPATH') or die;

	class Request_model extends CI_Model
	{

		# All blood sample requested count, returns an positive integer
		function getAllCount() {
			return $this->db->get('blood_request_tracker')->num_rows();
		}

		# Get all request made to a hospital, return object array
		function getAllByHospital($hospital_id) {
			return $this->db->where('blood_request_tracker.hospital_id', $hospital_id)
							->join('receiver', 'receiver.receiver_id=blood_request_tracker.receiver_id')
							->join('blood_sample', 'blood_sample.sample_id=blood_request_tracker.sample_id')
							->get('blood_request_tracker')
							->result();
		}

		function apply($receiver_id, $sample_id) {
			$query = $this->db->where('sample_id', $sample_id)
							->get('blood_sample');
			if($query->num_rows()) {
				$data = array(
					'receiver_id' => $receiver_id,
					'sample_id' => $sample_id,
					'hospital_id' => $query->row()->hospital_id,
					'date_requested' => date('Y-m-d H:i:s')
				);
				return $this->db->insert('blood_request_tracker', $data);
			} else {
				return false;
			}
		}

	}