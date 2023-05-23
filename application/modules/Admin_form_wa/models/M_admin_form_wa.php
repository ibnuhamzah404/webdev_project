<?php 


class M_admin_form_wa extends CI_Model{

	public function get_data($table, $id=false){
        
        if (!empty($id)) {
            $this->db->where('id', $id);
            return $this->db->get($table);
        }else{
        return $this->db->get($table);
        }
        
    }

    public function delete_data($kondisi){
        $this->db->where($kondisi);
        $this->db->delete('form_wa');
    }

}