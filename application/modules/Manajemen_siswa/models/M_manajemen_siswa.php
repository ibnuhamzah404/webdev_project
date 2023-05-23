<?php 

class M_manajemen_siswa extends CI_Model{


	public function get_data($table, $kondisi){
		$this->db->where('status !=', $kondisi);
    	return $this->db->get($table);

  		
	}

		public function update_aksi($id, $table, $status){
		
		
		$query = $this->db->query("UPDATE $table SET status='$status' WHERE id_siswa='$id'");
		return $query;
     
    }

    
    public function delete_data($kondisi){
    	$this->db->where($kondisi);
      	$this->db->delete('siswa');
    }




}