<?php 


class Materi extends CI_Controller{

	public function __construct() {
		
		parent::__construct();


    	$this->load->model('M_materi'); 
	
	}

	public function index($id=false){
		
		
		$detail = $this->M_materi->get_data('materi', $id)->result();
      	$data['detail'] = $detail;	

		


		
		$data['data_kelas'] = $this->M_materi->get_data('kelas')->result();
		$data['data_materi'] = $this->M_materi->get_data('materi')->result();

		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_materi', $data);	
		$this->load->view('templates/vt_footer');	

	}



	public function data_materi(){
		$deskripsi_materi = $this->input->post('deskripsi_materi');
		$judul = $this->input->post('judul');
    	$kelas = $this->input->post('kelas');
    	$file = $_FILES['file'];
    	$jenis_materi = $this->input->post('jenis_materi');
 		$datenow = date("Y/m/d"); 
 		$filename = $_FILES["file"]["name"];
		$file_ext = pathinfo($filename,PATHINFO_EXTENSION);
		$pembuat = $this->session->userdata('nama');
		$file_lama = $this->input->post('file_lama');
		$embed = $this->input->post('embed');

		
 		
		
		if (empty($filename)){
			$data = array(
			'judul_materi' => $judul,
			'kelas' => $kelas,
			'tanggal_posting'  => $datenow,
			'nama_file'  => $file_lama,
			'tipe_file'  => $file_ext,
			'jenis_materi' => $jenis_materi,
			'pembuat'  =>  $pembuat,
			'deskripsi_materi'  =>  $deskripsi_materi,
			'embed' => $embed
					
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
            	   print_r($file);
                echo $this->upload->display_errors();
                die();
            }else{
                $file = $this->upload->data('file_name');
            }


        }

        $data = array(
			'judul_materi' => $judul,
			'kelas' => $kelas,
			'tanggal_posting'  => $datenow,
			'nama_file'  => $file,
			'tipe_file'  => $file_ext,
			'jenis_materi' => $jenis_materi,
			'pembuat'  =>  $pembuat,
			'deskripsi_materi'  =>  $deskripsi_materi,
			'embed' => $embed
        );

       
      

    	}
    	 

    	 print_r($data);
    	 return $data;
    	


	}


	public function p_update_data($id){
		
		$data['data_materi'] = $this->M_materi->get_data('materi', $id)->result();
	  	$data['data_kelas'] = $this->M_materi->get_data('kelas')->result();

		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_update_data', $data);	
		$this->load->view('templates/vt_footer');	
	}

	public function update_data(){

		$id = $this->input->post('id_materi');

		$kondisi = array('id_materi' => $id);
        
		
		
        $this->M_materi->update_data($this->data_materi(),'materi', $kondisi);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data!</strong>Materi berhasil Diupdate
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');

		redirect('Materi/index');
	
	}

	 public function delete($id){
		$kondisi = array('id_materi' => $id);
		$this->M_materi->delete_data($kondisi, 'materi');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data!</strong> guru berhasil dihapus
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
			redirect('Materi/index');
	}


	public function input_data(){
		$this->M_materi->input_data($this->data_materi(), 'materi');
		redirect('Materi');
	}

	


	


	
}