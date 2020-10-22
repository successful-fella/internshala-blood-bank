<?php

	defined('BASEPATH') or die;

	class Samples_model extends CI_Model
	{

		# Get all available blood samples count, returns an integer
		function getAllCount() {
			return $this->db->get('blood_sample')->num_rows();
		}

	}