<?php 
class M_schat extends CI_Model{

	public function get_data($table, $id=false, $field=false){
    
    if (!empty($id)){
      $this->db->where($field, $id);
        return $this->db->get($table);
    }else{
        return $this->db->get($table);
      }
      
  }

  public function get_id_siswa($kondisi){
    
      return $this->db->query("SELECT id_siswa FROM siswa WHERE `username` = '$kondisi'");

      
  }

   public function input_data($data, $table){
     $this->db->insert($table,$data);
  }

   public function get_kelas($id){

      return $this->db->query("SELECT `id_kelas` FROM siswa WHERE id_siswa ='$id'");
   
  }

}

