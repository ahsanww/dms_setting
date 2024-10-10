<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Network extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('network_model');
	
	}
	public function setting()
	{	
		$row = $this->network_model->get_all();
		$data =array(
			'ipserver'			=>$row->ipserver,
			'iplocal'    		=> $row->iplocal,
			'gateway'    		=> $row->gateway,
			'dns'    			=> $row->dns,
			'netmask'    		=> $row->netmask,
			'kode_mesin'    	=> $row->kode_mesin,
			'mqtt_server'		=> $row->mqtt_server,
			'mqtt_username'		=> $row->mqtt_username,
			'mqtt_pass'			=> $row->mqtt_pass,
			'mqtt_port'			=> $row->mqtt_port,
			'ipgipat'			=> $row->ipgipat
	  );
		$this->load->view('templates/header'); //Load File
		$this->load->view('templates/sidebar'); //Load File
		$this->load->view('network_setting',$data); //Load File
		$this->load->view('templates/footer'); //Load File
	}
	public function Update(){
		$kode_mesin = $this->input->post('kode_mesin');
		$iplocal = $this->input->post('input_iplocal');
		$ipserver = $this->input->post('input_ipserver');
		$netmask = $this->input->post('input_netmask');
		$gateway = $this->input->post('input_gateway');
		$dns = $this->input->post('input_dns');
		$mqtt_server =$this->input->post('mqtt_server');
		$mqtt_username =$this->input->post('mqtt_username');
		$mqtt_pass = $this->input->post('mqtt_pass');
		$ipgipat= $this->input->post('input_ipgipat');
		$mqtt_port =$this->input->post('mqtt_port');
		if($netmask=='255.255.240.0'){
			$prefik=20;
		}elseif($netmask=='255.255.248.0'){
			$prefik=21;
		}elseif($netmask=='255.255.252.0'){
			$prefik=22;
		}elseif($netmask=='255.255.254.0'){
			$prefik=23;
		}elseif($netmask=='255.255.255.0'){
			$prefik=24;
		}elseif($netmask=='255.255.255.128'){
			$prefik=25;
		}elseif($netmask=='255.255.255.192'){
			$prefik=26;
		}elseif($netmask=='255.255.255.224'){
			$prefik=27;
		}elseif($netmask=='255.255.255.240'){
			$prefik=28;
		}elseif($netmask=='255.255.255.248'){
			$prefik=29;
		}elseif($netmask=='255.255.255.252'){
			$prefik=30;
		}elseif($netmask=='255.255.255.254'){
			$prefik=31;
		}elseif($netmask=='255.255.255.255'){
			$prefik=32;
		}else{
			$prefik=24;
		}
		$data = array(
			'prefik' =>$prefik,
			'kode_mesin' => $kode_mesin,
			'iplocal' => $iplocal,
			'ipserver' => $ipserver,
			'netmask' =>$netmask,
			'gateway' =>$gateway,
			'dns'	=>$dns,
			'flag'=>1,
			'mqtt_server'		=> $mqtt_server,
			'mqtt_username'		=> $mqtt_username,
			'mqtt_pass'			=> $mqtt_pass,
			'mqtt_port'			=> $mqtt_port,
			'ipgipat'			=>$ipgipat

		);
	$where = array(
		'kode_mesin' => $kode_mesin
	);
 
	$this->network_model->update($where,$data);
	redirect('index.php/network/setting');
	}
}
