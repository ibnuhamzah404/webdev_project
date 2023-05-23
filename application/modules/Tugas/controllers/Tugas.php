<?php  

class Tugas extends CI_Controller{

	public function __construct() {
		
		parent::__construct();


    	$this->load->model('M_tugas'); 
	
	}

	public function data_tugas(){
		$deskripsi_tugas = $this->input->post('deskripsi_tugas');
		$judul = $this->input->post('judul');
    	$kelas = $this->input->post('kelas');
    	$file = $_FILES['file'];
    	
 		$datenow = date("Y/m/d"); 
 		$tanggal_deadline = $this->input->post('tanggal_deadline');
 		$filename = $_FILES["file"]["name"];
		$file_ext = pathinfo($filename,PATHINFO_EXTENSION);
		$pembuat = $this->session->userdata('nama');
		$file_lama = $this->input->post('file_lama');

 		
		
		

		if (empty($filename)){
			$data = array(
			'judul_tugas' => $judul,
			'kelas' => $kelas,
			'tanggal_posting'  => $datenow,
			'nama_file'  => $file_lama,
			'tipe_file'  => $file_ext,
			'tanggal_deadline' => $tanggal_deadline,
			'pembuat'  =>  $pembuat,
			'deskripsi_tugas'  =>  $deskripsi_tugas
					
		);
        
     
       
		}else{
			
			
		

		 if($file=''){
        }else{

              $config['upload_path'] = './assets/upload/';
              $config['allowed_types'] = 'png|jpg|pdf|doc|mp4';
              $config['overwrite'] = true;

             $this->load->library('upload', $config);

            if(!$this->upload->do_upload('file')){
                echo "upload gagal";
                die();
            }else{
                $file = $this->upload->data('file_name');
            }


        }

        $data = array(
			'judul_tugas' => $judul,
			'kelas' => $kelas,
			'tanggal_posting'  => $datenow,
			'nama_file'  => $file,
			'tipe_file'  => $file_ext,
			
			'tanggal_deadline' => $tanggal_deadline,
			'pembuat'  =>  $pembuat,
			'deskripsi_tugas'  =>  $deskripsi_tugas

        );

       
      

    	}
    	 
    	
    	 return $data;


	}

	public function nilai_tugas($id_siswa, $id_tugas){
		
		$data['id_tugas'] =$id_tugas;
		$data['id_siswa']  = $id_siswa;
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_nilai', $data);	
		$this->load->view('templates/vt_footer');	
	}


	public function nilai_tugas_aksi(){
			$id_tugas = $this->input->post('id_tugas');
			$id_siswa = $this->input->post('id_siswa');
			$a = $this->input->post('nilai');


			$this->M_tugas->update_nilai($a, $id_siswa, $id_tugas);
			redirect('Tugas');
	}

	public function index(){

		$data['data_tugas'] = $this->M_tugas->get_data('tugas')->result();
		$data['data_kelas'] = $this->M_tugas->get_data('kelas')->result();
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_tugas', $data);	
		$this->load->view('templates/vt_footer');	
	}


	public function cek_tugas($nama_kelas, $id_tugas){
		// $data['data_siswa'] = $this->M_tugas->get_data('siswa', $nama_kelas, 'id_kelas')->result();
		$data['data_chat'] = $this->M_tugas->get_data('chat')->result();
		$data['data_siswa_belum'] = $this->M_tugas->get_data_bm( $nama_kelas)->result();
		$data['data_siswa_sudah'] = $this->M_tugas->get_data_w($nama_kelas, $id_tugas)->result();
		
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_cek_tugas', $data);	
		$this->load->view('templates/vt_footer');	
	}

	public function chat(){
		$dt = $this->session->userdata('username');
		$rl = $this->session->userdata('role_level');
		$pesan = $this->input->post('pesan');
	    $id_guru = $this->M_tugas->get_id_guru($dt)->result();
	    $arr = json_decode(json_encode($id_guru), true);
		$id = array_shift($arr[0]);

				

		$a = $this->M_tugas->get_kelas($dt)->result();
	   	$b = json_decode(json_encode($a), true);
	   	$c = array_shift($b[0]);



		$data = array(
			'user' => $dt, 
			'pesan'  => $pesan,
			'tanggal' => date("Y-m-d H:i:s"),
			'role_level' =>  $rl,
			'kelas'    => $c
			

		);



		$this->M_tugas->input_data($data, 'chat');
		redirect('Tugas/');
	}

	public function input_data(){
			$this->M_tugas->input_data($this->data_tugas(), 'tugas');


		redirect('Tugas');
	}

	public function p_update_data($id){

		$data['data_kelas'] = $this->M_tugas->get_data('kelas')->result();
		$data['data_tugas'] = $this->M_tugas->get_data('tugas', $id, 'id_tugas')->result();
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_update_data', $data);	
		$this->load->view('templates/vt_footer');	
	}

	public function personal_tugas($id_siswa, $id_tugas){
		$this->load->helper('download');
		$fileMateri = $this->M_tugas->download_tugas($id_siswa, $id_tugas, 'Y');
		if ($fileMateri > 0) {
			$file = 'assets/upload/'.$fileMateri['file_tugas'];
			force_download($file, NULL);
		}else{

		}
		
	
	}

	
		

	public function update_data(){

		$id = $this->input->post('id_tugas');

		$kondisi = array('id_tugas' => $id);
        
		
		
        $this->M_tugas->update_data($this->data_tugas(),'tugas', $kondisi);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data!</strong>Tugas berhasil Diupdate
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');

		redirect('Tugas/index');
	
	}

	 public function delete($id){
		$kondisi = array('id_tugas' => $id);
		$this->M_tugas->delete_data($kondisi, 'tugas');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data!</strong> tugas berhasil dihapus
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
			redirect('Tugas/index');
	}








}