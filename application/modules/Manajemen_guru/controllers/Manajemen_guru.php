<?php 


class Manajemen_guru extends CI_Controller{

	public function __construct() {
	

		parent::__construct();

		if (empty($this->session->userdata('nama')) || $this->session->userdata('role_level') == 'siswa'){
			redirect('Login/');
		}
    	$this->load->model('M_manajemen_guru'); 
	
	}

	 public function data_guru(){

	 	$nip = $this->input->post('nip');
    	$nama = $this->input->post('nama');
    	$username = $this->input->post('username');
    	$tgl_lahir = $this->input->post('tgl_lahir');
 		$jenis_kelamin = $this->input->post('jenis_kelamin');
 		$status       = $this->input->post('status');
		$password =   $this->input->post('password');
 		
 		


 		
		$data = array(
			'nip' => $nip,
			'nama' => $nama,
			'username' => $username,
			'tanggal_lahir' => $tgl_lahir,
			'jenis_kelamin' => $jenis_kelamin,
			'status'    => $status,
			'password'  => $password
		
					
		);

		return $data;
			
	}


	public function index(){
	
		$data['data_guru'] = $this->M_manajemen_guru->get_data('guru')->result();

		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_manajemen_guru', $data);	
		$this->load->view('templates/vt_footer');	

	}


	public function p_update_data($id){
		$data['data_guru'] = $this->M_manajemen_guru->get_data('guru', $id)->result();
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_update_data', $data);	
		$this->load->view('templates/vt_footer');	
	}

	public function update_data(){

		$id = $this->input->post('id_guru');

		$kondisi = array('id_guru' => $id);
        
		
		
        $this->M_manajemen_guru->update_data($this->data_guru(),'guru', $kondisi);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data!</strong>Kelas berhasil Diupdate
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');

		redirect('Manajemen_guru/index');
	
	}

	public function input_data(){
		$this->M_manajemen_guru->input_data($this->data_guru(), 'guru');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Selamat!</strong>guru berhasil ditambahkan
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
		redirect('Manajemen_guru/index');

	}

	public function nonaktif($id){
		$this->M_manajemen_guru->update_status($id, 'guru', 'nonaktif');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Selamat!</strong>guru berhasil dinonaktifkan
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
		redirect('Manajemen_guru/index');

	}

	 public function delete($id){
		$kondisi = array('id_guru' => $id);
		$this->M_manajemen_guru->delete_data($kondisi, 'guru');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data!</strong> guru berhasil dihapus
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
			redirect('Manajemen_guru/index');
	}

	public function aktivasi($id){
		$this->M_manajemen_guru->update_status($id, 'guru', 'aktif');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Selamat!</strong> guru berhasil diaktivasi kembali
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
		redirect('Manajemen_guru/index');

	}


	

	
}