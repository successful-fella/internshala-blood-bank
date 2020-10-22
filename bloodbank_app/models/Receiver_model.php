<?php

	defined('BASEPATH') or die;

	class Receiver_model extends CI_Model
	{

		function getAllRequestedCount() {
			return $this->db->get('blood_request_tracker')->num_rows();
		}

	}