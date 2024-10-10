<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scl extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('scl_model');
                $this->load->model('device_model');
		$this->load->helper(array('form', 'url'));
	}
	public function load()
	{	$id =$this->input->get('id');
                $no =$this->input->get('no');
                $data = array(
			'no' =>$no,
                        'id' =>$id );
		$row['data'] = $this->scl_model->get_all();
		$this->load->view('templates/header'); //Load File
		$this->load->view('templates/sidebar'); //Load File
		$this->load->view('device_scl', array('error' => ' ','no'=>$no,'id'=>$id ));
		$this->load->view('templates/footer'); //Load File
	}
        public function get_scl_machine(){
                $row['data'] = $this->scl_model->get_scl_machine();
                $row2['data'] = $this->device_model->get_device_all()->result();
                $data = array(
			'mon' =>$row['data'],
                        'device' =>$row2['data'] );
                echo json_encode($data);
        }
        public function load_byId(){
                $id =$this->input->get('id');
                $row = $this->scl_model->get_byid($id);
                echo json_encode($row);
        }
        public function get_status_scl(){
                $no = $this->input->get('no');
                $data['data'] = $this->scl_model->get_status_scl($no)->result();
		echo json_encode($data);	

        }
        public function load_scl_active(){
                $no = $this->input->get('no');
                $row['data']=$this->scl_model->get_scl_bydevice($no);
                $this->load->view('templates/header'); //Load File
		$this->load->view('templates/sidebar'); //Load File
                $this->load->view('device_scl_active',$row);
                $this->load->view('templates/footer'); //Load File
        } 
        public function load_scl_activeid(){
                $no = $this->input->get('no');
                $id = $this->input->get('id');
                $scl_id = $this->input->get('scl_id');
                $row=$this->scl_model->get_scl_byid($scl_id);
                $data =array(
			'scl_id'        =>$row -> id,
                        'domain_id'     =>$row ->domain_id,
                        'item_id'       =>$row ->item_id,
                        'active'        =>$row ->active,
                        'id_device'     =>$row ->id_device,
                        'alias'         =>$row ->alias,
                        'name'          =>$row ->name,
                        'data_type'     =>$row ->data_type,
                        'max_value'     =>$row ->max_value,
                        'unit'          =>$row ->unit,
                        'group'         =>$row ->group,
                        'divider'       =>$row ->divider,
                        'high'          =>$row ->status_high,
                        'low'           =>$row ->status_low,
                        'inter'          =>$row ->status_inter,
                        'bad_state'           =>$row ->status_bad

                );
                        

                $this->load->view('templates/header'); //Load File
		$this->load->view('templates/sidebar'); //Load File
                $this->load->view('device_scl_active_config',$data);
                $this->load->view('templates/footer'); //Load File
        }
        public function add_scl_activeid(){
                $this->load->view('templates/header'); //Load File
		$this->load->view('templates/sidebar'); //Load File
                $this->load->view('device_scl_active_config');
                $this->load->view('templates/footer'); //Load File
        }
        public function insert_scl_active(){
                $domain_id=$this->input->post('input_domain_id');
                $item_id=$this->input->post('input_item_id');
                $active=$this->input->post('active');
              
                $name = $this->input->post('input_name');
                $id_device =$this->input->post('id');
                $data_type=$this->input->post('data_type');
                $alias = $id_device.strtotime('now');
                $max_value=$this->input->post('max_value');
                $group =$this->input->post('max_value');
                $divider =$this->input->post('divider');
                $input_inter=$this->input->post('input_inter');
                $input_bad = $this->input->post('input_bad');
                $high =$this->input->post('high');
                $low =$this->input->post('low');

                $data = array(
			'domain_id'     =>$domain_id,
                        'item_id'       =>$item_id,
                         'active'       =>$active,
                         'alias'        =>$alias,
                         'name'         =>$name  ,
                         'id_device'    => $id_device ,
                         'data_type'    =>$data_type  ,
                         'max_value'    =>$max_value ,
                         'group'        =>$group ,
                         'divider'      =>$divider,
                         'status_inter'  =>$input_inter,
                         'status_bad'    =>$input_bad,
                          'status_high'   =>$high,
                        'status_low'    =>$low,
			
		);
                $res=$this->scl_model->insert_scl_active($data);
                if($res){
                        echo ('success');
                }
                else{
                        print_r('failed');
                }
        }
        public function update_scl_active(){
                $id_scl =$this->input->post('id');
                $domain_id=$this->input->post('input_domain_id');
                $item_id=$this->input->post('input_item_id');
                $active=$this->input->post('active');
                //$alias = $this->input->post('alias');
                $name = $this->input->post('input_name');
                $data_type=$this->input->post('data_type');
                $max_value= $this->input->post('max_value');
                $unit= $this->input->post('unit');
                $group =$this->input->post('group');
                $divider =$this->input->post('divider');
                $high =$this->input->post('high');
                $low =$this->input->post('low');
                $input_inter=$this->input->post('input_inter');
                $input_bad = $this->input->post('input_bad');

                $data = array(
			'domain_id'     =>$domain_id,
                        'item_id'       =>$item_id,
                        'active'       =>$active,
                         //'alias'        =>$alias,
                        'unit'         =>$unit,
                        'name'         =>$name ,
                        'data_type'    =>$data_type,
                        'max_value'    =>$max_value,
                        'group'        =>$group,
			'divider'       =>$divider,
                        'status_high'   =>$high,
                        'status_low'    =>$low,
                        'status_inter'  =>$input_inter,
                        'status_bad'    =>$input_bad
			
		);
		$where = array(
			'id' => $id_scl
		);
                $res=$this->scl_model->update_scl_active($where,$data);
                if($res){
                        echo ('success');
                }
                else{
                        print_r($res);
                }
        }
        public function delete_scl_active(){
                $no = $this->input->get('no');
                $dt=$this->scl_model->delete_scl_active($no);
		var_dump($dt);
        }

        public function save_scl(){
                $buf =$this->input->post('scl');
                if(strlen($buf)>0){
                        $scl=str_replace('%24', '$', $buf);
                        
                        $id = $this->input->post('id');
                        $no = $this->input->post('no');
                        $res=$this->scl_model->insert_multiple($id,$no,$scl);
                        if($res){
                        echo ('success');
                        }
                        else{
                        print_r('Errorr');
                        }
                }
                else{
                        print('Please Select Data'); 
                }
        
        }
	public function do_upload()
        {
                $id =$this->input->post('id');
                $no =$this->input->post('no');
         
                 //$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $file_name = $_FILES['userfile']['name'];
                $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $name = "scl_".$no.'.'.$file_ext;
                $config['upload_path']          = './upload/';
                $config['allowed_types']        = '*';
                $config['max_size']             =   100000000;
                                                  //2097152
                $config['file_name']            = $name;
                //$id =$this->input->post('id');
               
                $data = array(
			'scl_name' =>$name,
                        'scl_flag' =>1         );
                $where = array(
			'id_device' => $no
		);
                $res=$this->scl_model->upload_scl($where,$data);
                $this->load->library('upload', $config);
                $this->upload->overwrite = true;
                if ( ! $this->upload->do_upload('userfile'))
                {
                        
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('message', '<div class="text-danger">Upload Failed</div>');			
                        //$this->load->view('upload_form', $error);
                        redirect('index.php/scl/load?id='.$id.'&no='.$no);

                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $this->scl_model->update_status_scl(1,$no);
                        $this->session->set_flashdata('message', '</span>Upload Successs </span> </div>');
                        redirect('index.php/scl/load?id='.$id.'&no='.$no);
                        //$this->load->view('device_scl', $data);
                }
        }

}
