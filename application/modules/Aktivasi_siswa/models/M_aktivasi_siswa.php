<?php 

class M_aktivasi_siswa extends CI_Model{


	public function get_data($table, $kondisi=false){
		
		if (!empty($kondisi)) {
			$this->db->where('status', $kondisi);
    		return $this->db->get($table);
		}else{
		return $this->db->get($table);
		}
		

  		
	}

	public function update_data(){
		 $this->db->where($where);
      $this->db->update($table, $data);
	}

	public function update_aksi($id, $table, $status){
		
		
		$query = $this->db->query("UPDATE $table SET status='$status' WHERE id_siswa='$id'");
		return $query;
     
    }


   public function entry_kelas($table, $id,  $kelas){
		
		
		$query = $this->db->query("UPDATE $table SET `id_kelas` = '$kelas' WHERE id_siswa='$id'");
		return $query;
     
    }


    public function delete_data($kondisi){
    	$this->db->where($kondisi);
      	$this->db->delete('siswa');
    }



}