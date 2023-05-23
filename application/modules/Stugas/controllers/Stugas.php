<?php 



class Stugas extends CI_Controller{
	public $c = '';

	public function __construct() {
		parent::__construct();
		$this->load->model('M_stugas'); 
				
		

    	
	}

	public function tugas($id_tugas){
		$dt = $this->session->userdata('username');
	    $id_siswa = $this->M_stugas->get_id_siswa($dt)->result();
	    $arr = json_decode(json_encode($id_siswa), true);
		$id = array_shift($arr[0]);

		$data = array(
			'id_tugas' => $id_tugas,
			'id_siswa'  => $id,
			'status_penilaian'   => 'N',
			'status_pengumpulan'   => 'N'

		);

		$cek = $this->M_stugas->cek_hasil($id_tugas, $id, 'hasil_tugas');

		if ($cek=false) {
			$this->M_stugas->input_data($data, 'hasil_tugas');

		}
	}

	
	public function index(){
		$dt = $this->session->userdata('username');
	    $id_siswa = $this->M_stugas->get_id_siswa($dt)->result();
	    $arr = json_decode(json_encode($id_siswa), true);
		$id = array_shift($arr[0]);

		$a = $this->M_stugas->get_kelas($id)->result();
	   	$b = json_decode(json_encode($a), true);
	   	$c = array_shift($b[0]);
	   	


	   	// $data['hasil_tugas'] = $this->M_stugas->get_data('hasil_tugas')->result();

	   	// $data['hasil_tugas'] = $this->M_stugas->get_data('hasil', $id, 'id_siswa')->result();

		$data['data_tugas'] = $this->M_stugas->get_data('tugas', $c, 'kelas')->result();
		$data['data_chat'] = $this->M_stugas->get_data('chat')->result();

		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vs_sidebar');	
		$this->load->view('v_stugas', $data);	
		$this->load->view('templates/vt_footer');	
		
	}

	public function chat(){
		$dt = $this->session->userdata('username');
		$rl = $this->session->userdata('role_level');
		$pesan = $this->input->post('pesan');
	    $id_siswa = $this->M_stugas->get_id_siswa($dt)->result();
	    $arr = json_decode(json_encode($id_siswa), true);
		$id = array_shift($arr[0]);


		$a = $this->M_stugas->get_kelas($id)->result();
	   	$b = json_decode(json_encode($a), true);
	   	$c = array_shift($b[0]);

		$data = array(
			'user' => $dt, 
			'pesan'  => $pesan,
			'tanggal' => date("Y-m-d H:i:s"),
			'role_level' =>  $rl,
			'kelas'    => $c
			

		);

		$this->M_stugas->input_data($data, 'chat');
		redirect('Stugas');
	}


	public function v_detail($id_tugas){
		$dt = $this->session->userdata('username');
	    $id_siswa = $this->M_stugas->get_id_siswa($dt)->result();
	    $arr = json_decode(json_encode($id_siswa), true);
		$id = array_shift($arr[0]);

		$a = $this->M_stugas->get_kelas($id)->result();
	   	$b = json_decode(json_encode($a), true);
	   	$c = array_shift($b[0]);
	   	
	   	$data['cek'] = $this->M_stugas->cek_hasil($id_tugas, $id, 'hasil_tugas');

		$data['data_tugas'] = $this->M_stugas->get_data_w('tugas', $c, $id_tugas)->result();
		$data['data_hasil'] = $this->M_stugas->get_data_b('hasil_tugas', $id_tugas, $id)->result();

		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vs_sidebar');	
		$this->load->view('v_detail', $data);	
		$this->load->view('templates/vt_footer');	
	}






	public function download_tugas($id_tugas){
		$dt = $this->session->userdata('username');
	    $id_siswa = $this->M_stugas->get_id_siswa($dt)->result();
	    $arr = json_decode(json_encode($id_siswa), true);
		$id = array_shift($arr[0]);

		$data = array(
			'id_tugas' => $id_tugas,
			'id_siswa'  => $id,
			'status_penilaian'   => 'N',
			'status_pengumpulan'   => 'N'

		);

		$cek = $this->M_stugas->cek_hasil($id_tugas, $id, 'hasil_tugas');
		
		if ($cek == FALSE) {
			$this->M_stugas->input_data($data, 'hasil_tugas');


			$this->load->helper('download');
			$fileTugas = $this->M_stugas->download($id_tugas);
			$file = 'assets/upload/'.$fileTugas['nama_file'];
		
			force_download($file, NULL);
			redirect('Stugas');
		}else{
			
			$this->load->helper('download');
			$fileTugas = $this->M_stugas->download($id_tugas);
			$file = 'assets/upload/'.$fileTugas['nama_file'];
		
			force_download($file, NULL);
			redirect('Stugas');
	
		}

	

	}


	public function upload_tugas($id_tugas){
		
 		$filename = $_FILES["file_tugas"]["name"];	

 		

 		
		$dt = $this->session->userdata('username');
	    $id_siswa = $this->M_stugas->get_id_siswa($dt)->result();
	    $arr = json_decode(json_encode($id_siswa), true);
		$id = array_shift($arr[0]);

		
		$config['upload_path'] = './assets/upload/';
         $config['allowed_types'] = 'png|jpg|pdf|doc|mp4';
              $config['overwrite'] = true;

             $this->load->library('upload', $config);

            if(!$this->upload->do_upload('file_tugas')){
                echo "upload gagal";
                die();
            }else{
                $filename = $this->upload->data('file_name');
            }



		$this->M_stugas->upload_tugas($filename, $id_tugas, $id);
		
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data!</strong>Anda Berhasil mengirimkan tugas,  tugas anda akan segera dikoreksi lebih lanjut!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
		redirect('Stugas');
	}
		


}