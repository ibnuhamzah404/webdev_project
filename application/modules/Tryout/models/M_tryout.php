<?php 
class M_tryout extends CI_Model{
    public function get_data($table, $id=false){
        
        if (!empty($id)){
            $this->db->where('id', $id);
            return $this->db->get($table);
        }else{
            return $this->db->get($table);
    }
        
    }

    public function input_data($data, $table, $field_id){
          $this->db->query('SET @num = 0');
          $this->db->query('UPDATE '. $table .' SET ' . $field_id .  ' = @num := (@num+1)');

        
          $this->db->query('ALTER TABLE ' . $table . ' AUTO_INCREMENT =1');
         $this->db->insert($table,$data);
    }

     public function update_data($data, $table, $where){
        $this->db->where($where);
        $this->db->update($table, $data);
    }


     public function delete_data($kondisi, $table){
       
        $this->db->where($kondisi);
        $this->db->delete($table);
    }

}

 ?>