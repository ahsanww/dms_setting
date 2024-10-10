<?php
class Network_model extends CI_Model{
    public $table='network';
   
    // menampilkan data
    function get_all(){
        return $this->db->get($this->table)->row();
    }
 
    // Merubah data kedalam database
    function update($id, $data)
    {
      
        $this->db->update($this->table, $data);
        $this->db->where($this->$id);
    }

}
?>