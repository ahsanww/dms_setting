<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Device extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('device_model');
	
	}
	public function setting()
	{	
		$row = $this->device_model->get_all();

		$data =array(
			'id'			=>$row->id,
			'nama_gi'    	=> $row->nama_gi,
			'nama'    		=> $row->nama,
			'kode'    		=> $row->kode_mesin,
	  );
		$this->load->view('templates/header'); //Load File
		$this->load->view('templates/sidebar'); //Load File
		$this->load->view('device_setting',$data); //Load File
		$this->load->view('templates/footer'); //Load File
	}
	public function update_mesin(){
		$kode_mesin = $this->input->post('input_machine');
		$nama_gi = $this->input->post('input_gi');
		$nama = $this->input->post('input_device');
		
	
		$data = array(
			'nama' => $nama,
			'nama_gi' => $nama_gi,
			'kode_gi'=>$nama_gi
		);
	
		$where = array(
			'kode_mesin' => $kode_mesin
		);
	
		$this->device_model->update_mesin($where,$data);
		redirect('index.php/device/setting');
	}
	public function type()
	{	$data['data'] = $this->device_model->get_deviceid();	
		$this->load->view('templates/header'); //Load File
		$this->load->view('templates/sidebar'); //Load File
		$this->load->view('device_type',$data); //Load File
		$this->load->view('templates/footer'); //Load File
	}
	public function get_port(){
		$data['data'] = $this->device_model->get_port()->result();
		echo json_encode($data);	
		//print_r($data);
	}

	public function device_list(){
		$row['data'] = $this->device_model->get_device_all();	
		$this->load->view('templates/header'); //Load File
		$this->load->view('templates/sidebar'); //Load File
		$this->load->view('device_list',$row); //Load File
		$this->load->view('templates/footer'); //Load File
	}
	

	public function load_device(){
		$id =$this->input->get('id');
		$row = $this->device_model->get_device_byid($id);	
		$data =array(
			'no'=>$row->no,
			'id_device'	=>$row->id_device,
			'type'=>$row->type,
			'port_type'=>$row->port_type,
			'port_number'=>$row->port_number,
			'port_address'=>$row->port_address,
			'rack_location'=>$row->rack_location,
			'baudrate'=>$row->baudrate,
			'ip_address'=>$row->ip_address,
			'dns'=>$row->dns,
			'netmask'=>$row->netmask,
			'gateway'=>$row->gateway,
			'stop_bits'=>$row->stop_bits,
			'parity'=>$row->parity,
			'byte_size'=>$row->byte_size,
			'mode'=>$row->mode,
			'protocol'=>$row->protocol,
			'disturbance_type'=>$row->disturbance_type,
			'iec_file'=>$row->iec_file,
			'bay_name'=>$row->bay_name,
			'bay_code'=>$row->bay_code

	  );
	  	$this->load->view('templates/header'); //Load File
		$this->load->view('templates/sidebar'); //Load File
		$this->load->view('device_update',$data); //Load File
		$this->load->view('templates/footer'); //Load File
	}


	public function update_device(){
		$protocol =$this->input->post('protocol');
		$device_type = $this->input->post('device_type');
		$mode = $this->input->post('mode');
		$device_id =$this->input->post('device_id');
		$location =$this->input->post('location');
		$port_type =$this->input->post('port_type');
		$ip_addess =$this->input->post('ip_addess');
		$port_address =$this->input->post('port_address');
		$dns =$this->input->post('dns');
		$netmask =$this->input->post('netmask');
		$gateway =$this->input->post('gateway');
		$port_number =$this->input->post('port_number');
		$parity =$this->input->post('parity');
		$stop_bits =$this->input->post('stop_bits');
		$byte_size =$this->input->post('byte_size');
		$baudrate =$this->input->post('baudrate');
		$no =intval($this->input->post('no'));	
		$disturbance_type =	$this->input->post('disturbance_type');
		$bay_name =	$this->input->post('bay_name');
		$bay_code =	$this->input->post('bay_code');
		$iec_file =	$this->input->post('iec_file');
		$data = array(
			'protocol' =>$protocol,
			'type'=>$device_type,
			'mode'=>$mode,
			'id_device'=>$device_id,
			'rack_location'=>$location,
			'port_type'=>$port_type,
			'ip_address'=>$ip_addess,
			'port_address'=>$port_address,
			'dns'=>$dns,
			'netmask'=>$netmask,
			'gateway'=>$gateway,
			'port_number'=>$port_number,
			'parity'=>$parity,
			'byte_size'=>$byte_size,
			'baudrate'=>$baudrate,
			'stop_bits'=>$stop_bits,
			'disturbance_type'=>$disturbance_type,
			'bay_name'=>$bay_name,
			'bay_code'=>$bay_code,
			'iec_file'=>$iec_file

			
		);
		$where = array(
			'no' => $no
		);
		//var_dump($no);
		$res=$this->device_model->update_device($where,$data);
		//var_dump($res);
			if($res){
				echo ('success');
			}
			else{
				print_r($res);
			}
	}

	public function delete_device($no){
		$dt=$this->device_model->delete_device($no);
		if($res){
			echo ('success');
		}
		else{
			print_r($res);
		}
	}
	public function add_device()
		{	$protocol =$this->input->post('protocol');
			$device_type = $this->input->post('device_type');
			$mode = $this->input->post('mode');
			$device_id =$this->input->post('device_id');
			$location =$this->input->post('location');
			$port_type =$this->input->post('port_type');
			$ip_addess =$this->input->post('ip_addess');
			$port_address =$this->input->post('port_address');
			$dns =$this->input->post('dns');
			$netmask =$this->input->post('netmask');
			$gateway =$this->input->post('gateway');
			$port_number =$this->input->post('port_number');
			$parity =$this->input->post('parity');
			$stop_bits =$this->input->post('stop_bits');
			$byte_size =$this->input->post('byte_size');
			$baudrate =$this->input->post('baudrate');	
			// $bay_name =$this->input->post('bay_name');	
			// $bay_code =$this->input->post('bay_name');	
			$disturbance_type =	$this->input->post('disturbance_type');
		
			$iec_file =	$this->input->post('iec_file');
			$data = array(
				'protocol' =>$protocol,
				'type'=>$device_type,
				'mode'=>$mode,
				'id_device'=>$device_id,
				'rack_location'=>$location,
				'port_type'=>$port_type,
				'ip_address'=>$ip_addess,
				'port_address'=>$port_address,
				'dns'=>$dns,
				'netmask'=>$netmask,
				'gateway'=>$gateway,
				'port_number'=>$port_number,
				'parity'=>$parity,
				'byte_size'=>$byte_size,
				'baudrate'=>$baudrate,
				'stop_bits'=>$stop_bits,
				'disturbance_type'=>$disturbance_type,
				// 'bay_name'=>$bay_name,
				// 'bay_code'=>$bay_code,
				'iec_file'=>$iec_file
				
			);
			
			if($port_type!=2){
				$this->device_model->insert_m_file_iec($device_id);
				
			}
			$res['data']=$this->device_model->insert_device($data);
			if($res['data']){
				echo ('success');
			}
			else{
				print_r($res);
			}
		}

}
