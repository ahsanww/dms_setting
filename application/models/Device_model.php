<?php
class Device_model extends CI_Model{
    public $table='m_mesin';
   
    // menampilkan data
    function get_all(){
        return $this->db->get($this->table)->row();
    }
    function get_port(){
        //$qry ="select * from scan_port where port_device='0' AND status='1' order by id_device ASC";
        $qry ="select port_number from device_list order by port_number ASC";
        return $this->db->query($qry);
    }
    function get_deviceid(){
        $qry ="select * from device_list";
        return $this->db->query($qry);
    }
    function get_device_all(){
        $qry ="select a.type as relay_type,a.*,b.kode_mesin as machine_code,c.ipserver  from device_list a cross join m_mesin b cross JOIN network c";
        return $this->db->query($qry);
    }
    function get_device_byid($id){
        // $qry ="select * from device_list where no = 27";
        // return $this->db->query($qry);
        return $this->db->get_where('device_list',array('no' => $id))->row();
    }

    function get_device_bydevice($id){
        if($id==null){
            $id=0;
        }
  
        $qry="select c.kode_mesin, a.ip_address as ip,a.*, b.* from device_list a left join m_file_iec b on a.id_device = b.id_device cross join m_mesin c where a.id_device =$id";
        return $this->db->query($qry);
    }
    // Merubah data kedalam database
    function update_mesin($id, $data)
    {   //$this->db->where($id);
        $this->db->update($this->table, $data);
       
    }

    function update_device($no, $data)
    {$this->db->where($no);
    return $this->db->update('device_list', $data);   
    }
    function insert_device($data){
        return $this->db->insert('device_list',$data);
    }
    function insert_m_file_iec($id_device){
        $qry ='insert into m_file_iec 
        (`group`,domain_id,item_id,active,id_device,alias,name,data_type,status_high,status_low)
        values ("current","IA","IA",1,'.$id_device.',(SELECT CONCAT(kode_mesin,"'.$id_device.'IA") FROM m_mesin ),"Current A","float","on","off"),
               ("current","IB","IB",1,'.$id_device.',(SELECT CONCAT(kode_mesin,"'.$id_device.'IB") FROM m_mesin ),"Current B","float","on","off"),
               ("current","IC","IC",1,'.$id_device.',(SELECT CONCAT(kode_mesin,"'.$id_device.'IC") FROM m_mesin ),"Current C","float","on","off"),
               ("current","IN","IN",1,'.$id_device.',(SELECT CONCAT(kode_mesin,"'.$id_device.'IN") FROM m_mesin ),"Current N","float","on","off"),
               ("","healthy","healthy",1,'.$id_device.',(SELECT CONCAT(kode_mesin,"'.$id_device.'HEALTHY") FROM m_mesin ),"healthy","boolean","on","off"),
               ("","alarm","alarm",1,'.$id_device.',(SELECT CONCAT(kode_mesin,"'.$id_device.'ALARM") FROM m_mesin ),"alarm","boolean","on","off"),
               ("","trip","trip",1,'.$id_device.',(SELECT CONCAT(kode_mesin,"'.$id_device.'TRIP") FROM m_mesin ),"trip","boolean","on","off"),
               ("","t1","t1",1,'.$id_device.',(SELECT CONCAT(kode_mesin,"'.$id_device.'T1") FROM m_mesin ),"t1","boolean","on","off"),
               ("","t2","t2",1,'.$id_device.',(SELECT CONCAT(kode_mesin,"'.$id_device.'T2") FROM m_mesin ),"t2","boolean","on","off"),
               ("","t3","t3",1,'.$id_device.',(SELECT CONCAT(kode_mesin,"'.$id_device.'T3") FROM m_mesin ),"t3","boolean","on","off"),
               ("","t4","t4",1,'.$id_device.',(SELECT CONCAT(kode_mesin,"'.$id_device.'T4") FROM m_mesin ),"t4","boolean","on","off"); ';
      
        return $this->db->query($qry);
        //return $qry;
    }

    function delete_device($no){
        $qry = 'delete a,b from device_list a LEFT JOIN m_file_iec b on
        a.id_device=b.id_device
        where a.no = '.$no.'';
        return $this->db->query($qry);
    //      $this->db->where('no',$no);
    //    $dt=  $this->db->delete('device_list');
    //    $this->db->where('id_device',$no);
    //    $dt2=  $this->db->delete('m_file_iec');
         return $dt;
    }

}
?>