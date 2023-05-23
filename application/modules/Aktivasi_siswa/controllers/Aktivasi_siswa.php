<?php 


class Aktivasi_siswa extends CI_Controller{

	public function __construct() {
		
		parent::__construct();


    	$this->load->model('M_aktivasi_siswa'); 
	
	}


	public function index(){
		$data['data_siswa'] = $this->M_aktivasi_siswa->get_data('siswa', 'pending')->result();
		

		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_aktivasi_siswa', $data);	
		$this->load->view('templates/vt_footer');	

	}


	public function aktivasi($id){
			$data['data_kelas'] = $this->M_aktivasi_siswa->get_data('kelas')->result();
			$data['id_siswa'] = $id;
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_entry', $data);	
		$this->load->view('templates/vt_footer');

		

	}


	public function entry_kelas_aksi(){
		$kelas = $this->input->post('kelas');
		$id = $this->input->post('id_siswa');


		$this->M_aktivasi_siswa->entry_kelas('siswa', $id, $kelas);

		$this->M_aktivasi_siswa->update_aksi($id, 'siswa', 'aktif');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Selamat!</strong> siswa berhasil diaktifkan
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
		redirect('Aktivasi_siswa/index');

	}


	public function refuse($id){
		$kondisi = array('id_siswa' => $id);
		$this->M_aktivasi_siswa->delete_data($kondisi, 'siswa');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data!</strong> siswa berhasil dihapus/ditolak
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
			redirect('Aktivasi_siswa/index');
	}

}