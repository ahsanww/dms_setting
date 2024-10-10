<?php
class Event_model extends CI_Model{
    public $table='m_mesin';
   
    // menampilkan data
    function get_all(){
        $qry ="SELECT fileEvent.port_device,
                      fileEvent.id_device,
                      fileEvent.jumlah_data,
                      device_list.type,
                      device_list.ip_address,
                      device_list.port_type, 
                      device_list.port_number,
                      device_list.rack_location 
                FROM fileEvent 
                INNER JOIN device_list 
                ON fileEvent.id_device=device_list.id_device  
                WHERE fileEvent.jumlah_data>0 
                AND device_list.port_type=fileEvent.port_device";
        return $this->db->query($qry);
    }
 

}
?>