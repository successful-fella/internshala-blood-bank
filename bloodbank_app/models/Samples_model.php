<?php

	defined('BASEPATH') or die;

	class Samples_model extends CI_Model
	{

		function getAllCount() {
			return $this->db->get('blood_sample')->num_rows();
		}

	}