<?php 

class M_login extends CI_Model{


	public function input_data(){
		
	}

  public function get_data_w($table, $kondisi){
       $this->db->where('nama =', $kondisi);
      return $this->db->get($table);
  }

	public function cek_login($username, $password, $table){
    $username = set_value('username');
    $password = set_value('password');
      $email = set_value('email');

    $result = $this->db
                     ->where('username', $username)
                     ->where('password', $password)
                     ->limit(1)
                     ->get($table);

  if($result->num_rows() > 0){
    return $result->row();
  }else{
    return FALSE;
  }

  }


    public function cek_status($username, $password, $table, $status){
    $username = set_value('username');
    $password = set_value('password');

    $result = $this->db
                     ->where('username', $username)
                     ->where('status', $status)
                     ->limit(1)
                     ->get($table);

  if($result->num_rows() > 0){
  
    return TRUE;
  }else{
   
    return FALSE;
  }

  }






}