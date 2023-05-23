<?php 
class Tryout extends CI_Controller{
	public function __construct() {
		parent::__construct();

		if (empty($this->session->userdata('nama')) || $this->session->userdata('role_level') == 'siswa'){
			redirect('Login/');
		}

    $this->load->model('M_tryout'); 
	}


	public function data_tryout(){

	 	$judul = $this->input->post('judul');
    	$tanggal_pembuatan = $this->input->post('tanggal_pembuatan');
    	$jurusan_ujian = $this->input->post('jurusan_ujian');
    	$jenis_materi_ujian = $this->input->post('jenis_materi_ujian');
 		$waktu_ujian = $this->input->post('waktu_ujian');
 		$id_ulangan       = $this->input->post('id_ulangan');
			$pembuat = $this->session->userdata('username');
 			$id_ptrout = $this->input->post('ptrout');
 		


 		
		$data = array(
			'id_ulangan' => $id_ulangan,
			'id_tryout' => $id_ptrout,
			'judul_ulangan' => $judul,
			'tanggal_pembuatan' => $tanggal_pembuatan,
			'jenis_materi_ujian' => $jenis_materi_ujian,
			'waktu' => $waktu_ujian,
			'jurusan_ujian'    => $jurusan_ujian,
			'pembuat'  => $pembuat,
			'status'   => 'draft'
		
					
		);

		return $data;
			
	}
	public function index()
	{
		
		$data['data_to'] = $this->M_tryout->get_data('susun_to')->result();
		$data['data_ulangan'] = $this->M_tryout->get_data('ulangan')->result();
			$data['data_ptrout'] = $this->M_tryout->get_data('tryout')->result();
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_tryout', $data);	
		$this->load->view('templates/vt_footer');	

		
		
	}


	public function input_tryout(){
			$this->M_tryout->input_data($this->data_tryout(), 'susun_to', 'id');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Selamat!</strong>Tryout berhasil ditambahkan
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
		redirect('Tryout/');
	}

	public function input_ptrout(){
	    	$jurusan_ujian = $this->input->post('jurusan_ujian');
			$judul_ptrout = $this->input->post('judul_ptrout');
			$data = array(
		
			'nama' => $judul_ptrout,
			'jurusan_ujian' => $jurusan_ujian
					
		);

			$this->M_tryout->input_data($data, 'tryout', 'id');

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Selamat!</strong>Tryout berhasil ditambahkan
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
		redirect('Tryout/');
	}

	public function statusUlangan($status, $id){
		$where = array('id' => $id);
		$data = array('status' => $status);

		$this->M_tryout->update_data($data,'susun_to', $where);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data!</strong> berhasil mengupadate data!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
 		redirect('Tryout');
	}


	

	public function edit_tryout($id_ulangan){
		$data['data_kelas'] = $this->M_tryout->get_data('kelas')->result();
		$data['data_ulangan'] = $this->M_tryout->get_data('susun_to', $id_ulangan, 'id')->result();
		$data['id_ulangan'] = $id_ulangan;
		$data['data_ptrout'] = $this->M_tryout->get_data('tryout')->result();
			$data['dt_ul'] = $this->M_tryout->get_data('ulangan')->result();
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_edit_to', $data);	
		$this->load->view('templates/vt_footer');
	}

	public function edit_sub_to($id_sub_to){
		$data['data_sub_to'] = $this->M_tryout->get_data('tryout', $id_sub_to, 'id')->result();
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_edit_sub_to', $data);	
		$this->load->view('templates/vt_footer');
	}


	public function edit_sub_to_aksi(){
	$id_sub_to = $this->input->post('id');
		$judul   = $this->input->post('judul');
		$jurusan_ujian = $this->input->post('jurusan_ujian');
				$data = array(
		
			'nama' => $judul,
			'jurusan_ujian' => $jurusan_ujian
					
		);

 		$where = array('id' => $id_sub_to);
 		
 		$this->M_tryout->update_data($data ,'tryout', $where);

 		$this->session->flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data!</strong> berhasil mengedit  ulangan terbaru!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
 		redirect('Tryout', 'refresh');
	}


	public function edit_to_aksi(){
		$id_ulangan = $this->input->post('id');
		

 		$where = array('id' => $id_ulangan);
 		
 		$this->M_tryout->update_data($this->data_tryout(),'susun_to', $where);
 		$this->session->flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data!</strong> berhasil mengedit  ulangan terbaru!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
 		redirect('Tryout', 'refresh');
	}




	 public function delete($id){
		$kondisi = array('id' => $id);
		$this->M_tryout->delete_data($kondisi, 'susun_to');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data!</strong> ulangan berhasil dihapus 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
			redirect('Tryout/index');
	}

	 public function delete_to($id){
	 	$kondisi = array('id' => $id);
		$this->M_tryout->delete_data($kondisi, 'tryout');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data!</strong> tryout berhasil dihapus 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
			redirect('Tryout/index');
	 }

	
}