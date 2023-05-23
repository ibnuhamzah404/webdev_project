<?php 



class Ulangan extends CI_Controller{

public function __construct() {
		parent::__construct();

		if (empty($this->session->userdata('nama')) || $this->session->userdata('role_level') == 'siswa'){
			redirect('Login/');
		}

    $this->load->model('M_ulangan'); 
	}

	public function index()
	{
		$data['data_kelas'] = $this->M_ulangan->get_data('kelas')->result();
		$data['data_ulangan'] = $this->M_ulangan->get_data('ulangan')->result();

		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_ulangan', $data);	
		$this->load->view('templates/vt_footer');

	}


	public function input_ulangan(){
		$judul_ulangan = $this->input->post('judul');
		// $kelas = $this->input->post('kelas');
		$tanggal_pembuatan = $this->input->post('tanggal_pembuatan');
		$waktu_ujian = $this->input->post('waktu_ujian');
		$pembuat = $this->session->userdata('username');
		$jenis_materi = $this->input->post('jenis_materi_ujian');
		$jurusan_ujian = $this->input->post('jurusan_ujian');
	
 		$datenow = date("Y/m/d"); 
 		
 		$data = array(
 			'judul_ulangan' => $judul_ulangan,
 			'jenis_materi_ujian' => $jenis_materi,
 			'jurusan_ujian' => $jurusan_ujian,
 			'waktu' => $waktu_ujian,
 			'tanggal_pembuatan' => $tanggal_pembuatan,
 			'pembuat' => $pembuat
 		);
 		
 		$this->M_ulangan->input_data($data, 'ulangan', 'id_ulangan');
 		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data!</strong> berhasil mengedit  ulangan!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
 	
		redirect('Ulangan');
	}


	public function v_tambah_soal($id_ulangan){
		$data['soal_ulangan'] = $this->M_ulangan->get_data('soal_ulangan', $id_ulangan, 'id_ulangan')->result();
		$data['id_ulangan'] = $id_ulangan;
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_tambah_soal', $data);	
		$this->load->view('templates/vt_footer');
	}




	public function edit_ulangan($id_ulangan){
			$data['data_kelas'] = $this->M_ulangan->get_data('kelas')->result();
		$data['data_ulangan'] = $this->M_ulangan->get_data('ulangan', $id_ulangan, 'id_ulangan')->result();
		$data['id_ulangan'] = $id_ulangan;
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_update_data', $data);	
		$this->load->view('templates/vt_footer');
	}


	public function edit_soal($id_ulangan, $id_soal){
		$data['data_kelas'] = $this->M_ulangan->get_data('kelas')->result();
		$data['data_soal'] = $this->M_ulangan->get_data('soal_ulangan', $id_soal, 'id_soal')->result();
		$data['id_soal'] = $id_soal;
		$data['id_ulangan'] = $id_ulangan;
		
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_edit_soal', $data);	
		$this->load->view('templates/vt_footer');
	}

	public function edit_ulangan_aksi(){
		$id_ulangan = $this->input->post('id_ulangan');
		$judul_ulangan = $this->input->post('judul');
		$kelas = $this->input->post('kelas');
		$tanggal_pembuatan = $this->input->post('tanggal_pembuatan');
		$waktu_ujian = $this->input->post('waktu_ujian');
		$pembuat = $this->session->userdata('username');
		$jenis_materi = $this->input->post('jenis_materi_ujian');
		$jurusan_ujian = $this->input->post('jurusan_ujian');
	
 		$datenow = date("Y/m/d"); 
 		
 		$data = array(
 			'judul_ulangan' => $judul_ulangan,
 			'jenis_materi_ujian' => $jenis_materi,
 			'jurusan_ujian' => $jurusan_ujian,
 			'waktu' => $waktu_ujian,
 			'tanggal_pembuatan' => $tanggal_pembuatan,
 			'pembuat' => $pembuat
 		);

 		$where = array('id_ulangan' => $id_ulangan);
 		
 		$this->M_ulangan->update_data($data,'ulangan', $where);
 		$this->session->flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data!</strong> berhasil mengedit  ulangan terbaru!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
 		redirect('Ulangan', 'refresh');
	}

	public function statusUlangan($status, $id){
		$where = array('id_ulangan' => $id);
		$data = array('status' => $status);

		$this->M_ulangan->update_data($data,'ulangan', $where);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data!</strong> berhasil mengupadate data!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
 		redirect('Ulangan');
	}

	public function edit_soal_aksi(){
		$id_soal = $this->input->post('id_soal');
		$id_ulangan = $this->input->post('id_ulangan');
		$soal_ulangan = $this->input->post('soal');
		$pg_a = $this->input->post('pg_a');
		$pg_b = $this->input->post('pg_b');
		$pg_c = $this->input->post('pg_c');
		$pg_d = $this->input->post('pg_d');
		$pg_e = $this->input->post('pg_e');
			$bobot_nilai = $this->input->post('bobot_nilai');
		$kunci_jawaban = $this->input->post('kunci_jawaban');
		$pembahasan_soal = $this->input->post('pembahasan_soal');

		$data = array(
			'id_ulangan' => $id_ulangan,
			'soal' => $soal_ulangan,
			'pg_a' => $pg_a,
			'pg_b' => $pg_b,
			'pg_c' => $pg_c,
			'pg_d' => $pg_d,
			'pg_e' => $pg_e,
			'bobot_nilai' => $bobot_nilai,
 			'pg_jawaban' => $kunci_jawaban,
 			'pembahasan' => $pembahasan_soal,
 			


 		);

 		
 		$where = array('id_soal' => $id_soal);
 	
 		$this->M_ulangan->update_data($data,'soal_ulangan', $where);


 		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data!</strong> berhasil mengedit soal ulangan!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
 			redirect('Ulangan/v_lihat_soal/' . $id_ulangan);
	}


	public function v_lihat_soal($id_ulangan){
		$data['soal_ulangan'] = $this->M_ulangan->get_data('soal_ulangan', $id_ulangan, 'id_ulangan')->result();
		$data['id_ulangan'] = $id_ulangan;
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_lihat_soal', $data);	
		$this->load->view('templates/vt_footer');
	}



	 public function delete($id){
		$kondisi = array('id_ulangan' => $id);
		$this->M_ulangan->delete_data($kondisi, 'ulangan');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data!</strong> ulangan berhasil dihapus 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
			redirect('Ulangan/index');
	}

	 public function delete_soal($id){
		$kondisi = array('id_soal' => $id);
		$this->M_ulangan->delete_data($kondisi, 'soal_ulangan');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data!</strong> soal ulangan berhasil dihapus 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
	
		redirect('Ulangan/index');
	
	}




	public function tambah_soal_aksi(){
		$id_ulangan = $this->input->post('id_ulangan');
		$soal_ulangan = $this->input->post('soal');
		$pg_a = $this->input->post('pg_a');
		$pg_b = $this->input->post('pg_b');
		$pg_c = $this->input->post('pg_c');
		$pg_d = $this->input->post('pg_d');
		$pg_e = $this->input->post('pg_e');
		$no_soal  = $this->input->post('no_soal');
			$bobot_nilai = $this->input->post('bobot_nilai');
		$kunci_jawaban = $this->input->post('kunci_jawaban');
		$pembahasan_soal = $this->input->post('pembahasan_soal');

		$data = array(
			'id_ulangan' => $id_ulangan,
			'no_soal'    => $no_soal,
			'soal' => $soal_ulangan,
			'pg_a' => $pg_a,
			'pg_b' => $pg_b,
			'pg_c' => $pg_c,
			'pg_d' => $pg_d,
			'pg_e' => $pg_e,
				'bobot_nilai' => $bobot_nilai,
 			'pg_jawaban' => $kunci_jawaban,
 			'pembahasan' => $pembahasan_soal,
 			


 		);



 		$this->M_ulangan->input_data($data, 'soal_ulangan', 'id_soal');
		redirect('Ulangan');
	}

	public function cek_hasil($id_ulangan =false, $kelas =false){
		
		$data['data_siswa_sudah']  =  $this->M_ulangan->get_data_s($id_ulangan)->result();
		$data['data_siswa_belum']  =  $this->M_ulangan->get_data_b($kelas)->result();
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_cek_hasil', $data);	
		$this->load->view('templates/vt_footer');
	}



	public function detail_hasil($id_hasil){
		
		$data['detail_hasil']  =  $this->M_ulangan->get_data('hasil_ulangan', $id_hasil, 'id_hasil_ulangan')->result();
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_detail_hasil', $data);	
		$this->load->view('templates/vt_footer');
	}

	
}
