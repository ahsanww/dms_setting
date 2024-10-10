<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disturbance extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('disturbance_model');
	
	}
	public function setting()
	{	
		$row['data'] = $this->disturbance_model->get_all();	
		$this->load->view('templates/header'); //Load File
		$this->load->view('templates/sidebar'); //Load File
		$this->load->view('disturbance_setting',$row); //Load File
		$this->load->view('templates/footer'); //Load File
	
		
	}
}
