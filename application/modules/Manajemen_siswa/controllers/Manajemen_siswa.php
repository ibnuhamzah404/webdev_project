<?php 


class Manajemen_siswa extends CI_Controller{

	public function __construct() {
		
		parent::__construct();
		if (empty($this->session->userdata('nama')) || $this->session->userdata('role_level') == 'siswa'){
			redirect('Login/');
		}

    	$this->load->model('M_manajemen_siswa'); 
	
	}


	public function index(){
	
		$data['data_siswa'] = $this->M_manajemen_siswa->get_data('siswa',  'pending')->result();

		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_manajemen_siswa', $data);	
		$this->load->view('templates/vt_footer');	

	}


	public function nonaktif($id){
		$this->M_manajemen_siswa->update_aksi($id, 'siswa', 'nonaktif');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Selamat!</strong> siswa berhasil dinonaktifkan
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
		redirect('Manajemen_siswa/index');

	}


	public function aktivasi($id){
		$this->M_manajemen_siswa->update_aksi($id, 'siswa', 'aktif');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Selamat!</strong> siswa berhasil diaktivasi kembali
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
		redirect('Manajemen_siswa/index');

	}


		public function refuse($id){
		$kondisi = array('id_siswa' => $id);
		$this->M_manajemen_siswa->delete_data($kondisi, 'siswa');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data!</strong> siswa berhasil dihapus
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
			redirect('Manajemen_siswa/index');
	}


	
}