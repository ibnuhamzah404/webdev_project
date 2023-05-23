<?php 


class M_stugas extends CI_Model{

	public function get_data($table, $id=false, $field=false){
    
    if (!empty($id)){
      $this->db->where($field, $id);
        return $this->db->get($table);
    }else{
        return $this->db->get($table);
      }
      
  }

  public function input_data($data, $table){
     $this->db->insert($table,$data);
  }

   public function get_id_tugas($kondisi){
    
      return $this->db->query("SELECT id_tugas FROM hasil_tugas WHERE `id_siswa` = '$kondisi'");

      
  }

   public function get_id_siswa($kondisi){
    
      return $this->db->query("SELECT id_siswa FROM siswa WHERE `username` = '$kondisi'");

      
  }

   public function get_data_w($table, $kondisi, $kondisi2){
    return $this->db->query("SELECT * FROM $table  WHERE `kelas` = '$kondisi' AND `id_tugas` = '$kondisi2'");
   

      
  }

  public function get_data_b($table, $kondisi, $kondisi2){
    return $this->db->query("SELECT * FROM $table  WHERE `id_tugas` = '$kondisi' AND `id_siswa` = '$kondisi2'");
   

      
  }

  public function get_kelas($id){

      return $this->db->query("SELECT `id_kelas` FROM siswa WHERE id_siswa ='$id'");
   
  }

  public function cek_hasil($id_tugas, $id_siswa, $table){
  

    $result = $this->db
                     ->where('id_tugas', $id_tugas)
                     ->where('id_siswa', $id_siswa)
                     ->limit(1)
                     ->get($table);

  if($result->num_rows() > 0){
  
    return TRUE;
  }else{
   
    return FALSE;
  }


}


public function upload_tugas($file_tugas, $id_tugas, $id){
  return $this->db->query("UPDATE `hasil_tugas` SET file_tugas='$file_tugas', status_pengumpulan='Y', status_penilaian='N' WHERE id_siswa ='$id' AND id_tugas='$id_tugas'");
}
public function download($id){

     $query= $this->db->get_where('tugas', array('id_tugas'=>$id));
     return $query->row_array();
  }
}

