<?php 


class M_smateri extends CI_Model{

	public function get_data($table){
    
      return $this->db->get($table);

      
  }


  public function get_id_siswa($kondisi){
    
      return $this->db->query("SELECT id_siswa FROM siswa WHERE `username` = '$kondisi'");

      
  }

    public function get_data_w($table, $kondisi){
    return $this->db->query("SELECT `result` FROM hasil_vark WHERE `id_siswa` = '$kondisi'");
   

      
  }

   public function get_data_j($table, $kondisi1 , $kondisi2){
    return $this->db->query("SELECT * FROM $table WHERE `jenis_materi` = '$kondisi1' AND `kelas` = '$kondisi2'");
   

      
  }

  public function get_data_b($table, $kondisi){
    return $this->db->query("SELECT id_kelas FROM $table WHERE `id_siswa` = '$kondisi'");
   

      
  }

  public function download_materi($id){
    $query= $this->db->get_where('materi', array('id_materi'=>$id));
    return $query->row_array();
  }

  

}