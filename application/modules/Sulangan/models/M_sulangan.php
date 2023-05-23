<?php 


class M_sulangan extends CI_Model{
	public function get_data($table, $id=false){
		
		if (!empty($id)){
			$this->db->where('id', $id);
    		return $this->db->get($table);
		}else{
    		return $this->db->get($table);
    }
  		
	}
    
    
    public function get_tryout($table, $jurusan){
     return $this->db
                     ->where('jurusan_ujian', $jurusan)
                     ->get($table);
  }


 public function get_count($table){
    $this->db->from($table);
 
    return $num_rows = $this->db->count_all_results();
  }

  public function get_publikasi($table, $where1, $where2, $where3){


       return $this->db
                     ->where('status', $where1)
                     ->where('jurusan_ujian', $where2)
                    ->where('jenis_materi_ujian', $where3)
                     ->get($table);
  }


   public function get_status_hasil_ulangan($table, $id_siswa, $jenis_materi){


        return $this->db
        ->query("SELECT * FROM hasil_ulangan WHERE id_to IN (SELECT id FROM susun_to WHERE id_siswa =" .$id_siswa. " AND jenis_materi_ujian ='$jenis_materi')");


        
  }

  public function jumlah_soal($table, $kondisi1){
    return $this->db->query('SELECT COUNT(*) FROM ' . $table . ' WHERE id_ulangan= ' . $kondisi1);
  }

public function compare_jawaban($table, $where1, $where2, $where3){


       $result =  $this->db
        ->where('id_ulangan', $where1)
                     ->where('no_soal', $where2)
                     ->where('pg_jawaban', $where3)
                    
                     ->get($table);

          if($result->num_rows() > 0){
    return TRUE;
  }else{
    return FALSE;
  }
  }
  public function get_one_row($table, $id){
    return $this->db->query('SELECT jurusan FROM '. $table .' WHERE id_siswa= ' . $id);

    
  }

  public function cek_waktu($table, $id_ulangan, $id_siswa){
     $result = $this->db
                     ->where('id_ulangan', $id_ulangan)
                     ->where('id_siswa', $id_siswa)
                      
                     ->limit(1)
                     ->get($table);

  if($result->num_rows() > 0){
    return TRUE;
  }else{
    return FALSE;
  }
  }


  public function get_waktu($table, $id_ulangan, $id_siswa ){
    $query = $this->db->query('SELECT * FROM '. $table .' WHERE id_siswa= ' . $id_siswa .' AND id_ulangan='.$id_ulangan);

    return $query->row();
  }
	public function get_jawaban($table, $id=false, $jawaban=false){
		if(!empty($id) and !empty($jawaban)){
		 $query = $this->db->query("SELECT * FROM soal_ulangan WHERE `id_soal` = '$id' AND `pg_jawaban` = '$jawaban'");

		  return $query->num_rows();
		 }else{
		 	$query = $this->db->query("SELECT * FROM soal_ulangan WHERE `id_ulangan` = '$id'");

		  return $query->num_rows();
		 }
	}

	public function get_id_siswa($kondisi){
    
      return $this->db->query("SELECT id_siswa FROM siswa WHERE `username` = '$kondisi'");

      
  }

  public function get_bobot_nilai($kondisi1, $kondisi2){
    
      $query = $this->db->query("SELECT bobot_nilai FROM soal_ulangan WHERE no_soal=" . $kondisi1 . " AND id_ulangan=" . $kondisi2);
       return $query;
      
  }

  public function input_data($data, $table, $field_id){

      $this->db->query('SET @num = 0');
      $this->db->query('UPDATE '. $table .' SET ' . $field_id .  ' = @num := (@num+1)');
      $this->db->query('ALTER TABLE ' . $table . ' AUTO_INCREMENT =1');
     $this->db->insert($table,$data);
  }

  public function get_hasil_ulangan($table, $id_ulangan, $id_siswa){
  	 $result = $this->db
                     ->where('id_to', $id_ulangan)
                     ->where('id_siswa', $id_siswa)
                      ->where('status', 'Y')
                     ->limit(1)
                     ->get($table);

  if($result->num_rows() > 0){
    return TRUE;
  }else{
    return FALSE;
  }
  }

   public function cek_pg($table, $id_ulangan, $id_siswa, $no_soal){
     $result = $this->db
                    ->where('no_soal', $no_soal)
                     ->where('id_ulangan', $id_ulangan)
                     ->where('id_siswa', $id_siswa)
                    
                     ->limit(1)
                     ->get($table);

  if($result->num_rows() > 0){
    return TRUE;
  }else{
    return FALSE;
  }
  }
  public function get_score($table, $id_ulangan, $id_siswa){
  	return $this->db
                     ->where('id_to', $id_ulangan)
                     ->where('id_siswa', $id_siswa)
                      ->where('status', 'Y')
                     ->limit(1)
                     ->get($table);

  
  }



  public function getRow($table, $id){
    $query = $this->db->query('SELECT * FROM '. $table .' WHERE id_ulangan= ' . $id);

    return $query->num_rows();
  }


  public function getOne($table, $id_ulangan, $id_soal){
    return $this->db
                     ->where('id_ulangan', $id_ulangan)
                   
                     ->limit(1,$id_soal-1)
                     ->get($table);
   


  }

   public function co_jawaban($table,  $id_ulangan, $id_soal, $pg_jawaban){
    $result = $this->db

                     ->where('id_ulangan', $id_ulangan)
                     ->where('pg_jawaban', $pg_jawaban)
                     ->limit(1,$id_soal-1)
                     ->get($table);
             
      if($result->num_rows() > 0){
    return TRUE;
  }else{
    return FALSE;
  }


  }


  public function get_min_no($id_ulangan){
      return $this->db->query("SELECT MIN(no_soal) FROM soal_ulangan WHERE id_ulangan = " . $id_ulangan);
  }
   public function get_b_n($table, $id_ulangan, $id_soal){
    return $this->db
                     ->where('id_ulangan', $id_ulangan)
                   
                     ->limit(1,$id_soal-1)
                     ->get($table) ->row()->bobot_nilai;
     
          
  }


  public function get_jawaban_user($table, $id_ulangan, $id_soal, $id_siswa){
     return $this->db
                     ->where('id_ulangan', $id_ulangan)
                      ->where('id_siswa', $id_siswa)
                       ->where('no_soal', $id_soal)
                     
                     ->get($table)->row();

                     
  }



}