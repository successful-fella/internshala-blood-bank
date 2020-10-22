<?php

	defined('BASEPATH') or die;

	class Hospital_model extends CI_Model
	{

		function getLast($how_many = 5) {
			return $this->db->order_by('hospital_id')
							->get('hospital')
							->result_array();
		}

		function getAllCount() {
			return $this->db->get('hospital')->num_rows();
		}

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