<?php
class Scl_model extends CI_Model{
    public $table='m_file_iec';
    public $table2='device_list';
   
    // menampilkan data
    function get_all(){
        return $this->db->get($this->table)->row();
    }
    function get_scl_machine(){
      $qry0 =  "UPDATE flag_config set flag_program_iec=1";
          $qry =  "SELECT
                      a.*, b.kode_mesin AS machine_code,
                      c.ipserver,c.ipgipat,d.type as relaytype,d.port_type
                    FROM
                      m_file_iec a
                    CROSS JOIN m_mesin b
                    CROSS JOIN network c
                    LEFT JOIN device_list d
                    on a.id_device = d.id_device";
         $this->db->query($qry0);
        return $this->db->query($qry)->result();
    }
    function get_byid($id){
        $qry =" SELECT * from it_file_iec where id_device = ".$id."";
        return $this->db->query($qry)->result();
      //  return $this->db->get_where('m_file_iec',array('id_device' => $id))->row();
    }
  
    function get_scl_bydevice($id){
      $qry = "SELECT * from m_file_iec WHERE id_device = '$id'";
      return $this->db->query($qry);
    }
    function update_scl_active($no, $data)
    {$this->db->where($no);
    return $this->db->update('m_file_iec', $data);   
    }
    function insert_scl_active($data){
      return $this->db->insert('m_file_iec',$data);
    }
    function update_status_scl($dt,$id){
      $qry = "UPDATE device_list set scl_flag=$dt where id_device ='$id'";
      return $this->db->query($qry);
    }
    function delete_scl_active($no){
      $this->db->where('id',$no);
      $dt=  $this->db->delete('m_file_iec');
        return $dt;
    }

    function get_status_scl($x){
        $qry ="select * from device_list where id_device = $x";
        return $this->db->query($qry);
    }
    function get_scl_byid($id){
      //$qry = "SELECT * from m_file_iec WHERE id = '$id'";
      $this->db->where('id',$id);
      return $this->db->get($this->table)->row();
    }
    function upload_scl($id, $data)
    {        $this->db->where($id);
            $this->db->update($this->table2, $data);
    }
    function insert_multiple($id,$no,$data){
        $buf=explode("&",$data);
        $qry1="Delete from m_file_iec where id_device =".$no;
        $qry2 = "INSERT INTO m_file_iec (domain_id,item_id,id_device,active,alias) VALUES"; 
        //$qry3="UPDATE device_list set scl_flag = 2 where id_device=".$no;
        
        $dt="";
        for($i=0;$i<count($buf);$i++){
             $buf2= explode("=",$buf[$i]);
             if($i==count($buf)-1){
                $dt .="('".$buf2[0]."','".$buf2[1]."',".$no.",1,'".$no.time().$i."')";   
             }
             else{
                $dt .="('".$buf2[0]."','".$buf2[1]."',".$no.",1,'".$no.time().$i."'),";
             }
        }
        $qry2.=$dt;
        //$this->db->query($qry1);
        //$this->db->query($qry3);
        return $this->db->query($qry2);
      //  return $qry3;
    }

}

?>