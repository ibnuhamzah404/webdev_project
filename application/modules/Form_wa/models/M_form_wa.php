<?php 



class M_form_wa extends CI_Model{

	public function get_data($table, $id=false){
		
		if (!empty($id)) {
			$this->db->where('id_form_wa', $id);
    		return $this->db->get($table);
		}else{
    	return $this->db->get($table);
    	}
  		
	}

	public function input_data($data, $table){
		 $this->db->insert($table,$data);
	}

	
}
