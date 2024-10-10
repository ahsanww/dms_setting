<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('event_model');
	
	}
	public function setting()
	{	
		$row['data'] = $this->event_model->get_all();	
		$this->load->view('templates/header'); //Load File
		$this->load->view('templates/sidebar'); //Load File
		$this->load->view('event_setting',$row); //Load File
		$this->load->view('templates/footer'); //Load File
	
		
	}
}
