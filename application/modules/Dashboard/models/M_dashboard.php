<?php 


class M_dashboard extends CI_Model{

	public function get_count($table){
    $this->db->from($table);
 
    return $num_rows = $this->db->count_all_results();
  }
}