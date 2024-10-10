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
	public function readFile()
{	$name =$this->input->get('nm');
    // you would use it in your own method where $name_hash has generated value
    $file = 'C:/Users/user/Documents/coba/'.$name;
	echo $file;
    if (file_exists($file)) {
          echo $file;
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($file));
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		ob_clean();
		flush();
		readfile($file);
		exit;
		}
    else "Can not read the file";
}
}
