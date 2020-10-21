<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	$route['default_controller'] = 'init';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;


	# Custom routes
	$route['sign-in/hospital'] = "hospital/signin";
	$route['sign-in/receiver'] = "receiver/signin";