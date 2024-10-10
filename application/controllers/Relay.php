<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relay extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	function __construct() {
		parent::__construct();
		$this->load->model('device_model');
	
	}
	public function detail()
	{	$id =$this->input->get('id');
		$row['data'] = $this->device_model->get_device_bydevice($id);	
		$this->load->view('templates/header'); //Load File
		$this->load->view('templates/sidebar'); //Load File
		$this->load->view('relay_detail',$row); //Load File
		$this->load->view('templates/footer'); //Load File
		
		
	}
}
