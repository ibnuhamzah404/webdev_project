<?php 



class Gudang_gambar extends CI_Controller{


	public function __construct() {
		
		parent::__construct();


    	$this->load->model('M_gudang_gambar'); 
	
	}

	public function data_gambar(){
		
    	
    	$file = $_FILES['file']['tmp_name'];
    	$judul = $this->input->post('judul');
 		
 		$filename = $_FILES["file"]["name"];
		
 		 $data = array(
			'nama' => $judul,
			'path' => $filename
      
		);
		if (empty($filename)){
			$data = array(
			'nama' => $filename,
			'path' => $file
					
		);
        
  	
       
		}else{
			
			
		
		

		 if($file=''){
        }else{

              $config['upload_path'] = './assets/upload/';
              $config['allowed_types'] = '*';
              $config['overwrite'] = true;
              $config['max_size'] = '10000000000'; 

             $this->load->library('upload', $config);
             	
            if(!$this->upload->do_upload('file')){
            	  
                echo $this->upload->display_errors();
                die();
            }else{
                $file = $this->upload->data('file_name');

    	
            }


        }

     

     
    	}
    	 

   return $data; 		
    	


	}


	public function index()
	{
		$data['data_g_gambar'] = $this->M_gudang_gambar->get_data('gudang_gambar')->result();
		
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_gudang_gambar', $data);	
		$this->load->view('templates/vt_footer');	

		
		
	}

	public function input_data(){
		$this->M_gudang_gambar->input_data($this->data_gambar(), 'gudang_gambar', 'id');
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data!</strong> Gambar berhasil diupload!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
		redirect('Gudang_gambar');
	}

	 public function delete($id){
		$kondisi = array('id' => $id);
		$this->M_gudang_gambar->delete_data($kondisi, 'gudang_gambar');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data!</strong> guru berhasil dihapus
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
			redirect('Gudang_gambar');
	}



	
}