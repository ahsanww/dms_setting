<?php
class Disturbance_model extends CI_Model{
    public $table='m_mesin';
    
    // menampilkan data
    
    function get_all(){
        $qry =" SELECT  fileDR.port_device, 
                        fileDR.id_device, 
                        fileDR.jumlah_data,
                        device_list.type,
                        device_list.ip_address ,
                        device_list.port_type, 
                        device_list.port_number,
                        device_list.rack_location
                FROM fileDR 
                INNER JOIN device_list 
                ON fileDR.id_device=device_list.port_number 
                WHERE fileDR.jumlah_data>0 
                AND device_list.port_type=fileDR.port_device";
        return $this->db->query($qry);
    }
 
    // Merubah data kedalam database
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

}
?>