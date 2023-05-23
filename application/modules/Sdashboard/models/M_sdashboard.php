<?php 


class M_sdashboard extends CI_Model{

	public function get_count($table, $materi, $kelas){
$this->db->select('result');
$this->db->from($table);
$this->db->where('jenis_materi', $materi);
$this->db->where('kelas', $kelas);
return $num_results = $this->db->count_all_results();
  }

    public function get_w($table, $kelas){
$this->db->select('kelas');
$this->db->from($table);
$this->db->where('kelas', $kelas);
return $num_results = $this->db->count_all_results();
  }

   public function status_vark($id, $table){
    $result = $this->db
                     ->where('id_siswa', $id)
                     
                     ->limit(1)
                     ->get($table);

     if($result->num_rows() > 0){
 
    return TRUE;
  }else{
   
    return FALSE;
  }
  }

  public function get_id_siswa($kondisi){
    
      return $this->db->query("SELECT id_siswa FROM siswa WHERE `username` = '$kondisi'");

      
  }


    public function get_data_b($table, $kondisi){
    return $this->db->query("SELECT id_kelas FROM $table WHERE `id_siswa` = '$kondisi'");
   

      
  }

  public function get_vark($table, $id){

      return $this->db->query("SELECT result FROM $table WHERE `id_siswa` = '$id'");
  }
}