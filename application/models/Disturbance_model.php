<?php
class Disturbance_model extends CI_Model{
    public $table='m_mesin';
    
    // menampilkan data
    
    function get_all(){
        $qry =" SELECT
            a.*,
            b.type,
            b.ip_address,
            b.port_type,
            b.port_number,
            b.rack_location,
            a.flag
        FROM
            fileDR_temp a
            INNER JOIN device_list b ON a.id_device = b.id_device ";
        return $this->db->query($qry);
    }
     function get_disturbance(){
        $qry ="SELECT * from filedr_temp";
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