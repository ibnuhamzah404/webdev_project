<?php 


class Manajemen_kelas extends CI_Controller{

	public function __construct() {
	

		parent::__construct();

		if (empty($this->session->userdata('nama')) || $this->session->userdata('role_level') == 'siswa'){
			redirect('Login/');
		}
    	$this->load->model('M_manajemen_kelas'); 
	
	}

	 public function data_kelas(){

	 	$nama_kelas = $this->input->post('nama_kelas');
    	$wali_kelas = $this->input->post('wali_kelas');
    	
 		
 		


 		
		$data = array(
			'nama_kelas' => $nama_kelas,
			'wali_kelas' => $wali_kelas,
			
					
		);

		return $data;
			
	}


	public function index(){


		$data['data_guru'] = $this->M_manajemen_kelas->get_data('guru')->result();
		$data['data_kelas'] = $this->M_manajemen_kelas->get_data('kelas')->result();
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_manajemen_kelas', $data);	
		$this->load->view('templates/vt_footer');	

	}


	public function lihat_siswa($nama_kelas){
		$data['data_siswa'] = $this->M_manajemen_kelas->get_data('siswa', $nama_kelas )->result();
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_lihat_siswa', $data);	
		$this->load->view('templates/vt_footer');	
	}




	public function input_data(){
		$this->M_manajemen_kelas->input_data($this->data_kelas(), 'kelas');
		redirect('Manajemen_kelas');
	}

	public function delete_data($id){
		$kondisi = array('id_kelas' => $id);
		$this->M_manajemen_kelas->delete_data($kondisi, 'kelas');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data!</strong>Kelas berhasil dihapus
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
			redirect('Manajemen_kelas/index');
	}


	public function p_update_data($id){

		$data['data_kelas'] = $this->M_manajemen_kelas->get_data('kelas', $id)->result();
	   $data['data_guru'] = $this->M_manajemen_kelas->get_data('guru')->result();

		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_update_data', $data);	
		

		$this->load->view('templates/vt_footer');
	}
	public function update_data(){

		$id = $this->input->post('id_kelas');

		$kondisi = array('id_kelas' => $id);
        
		
		
        $this->M_manajemen_kelas->update_data($this->data_kelas(),'kelas', $kondisi);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data!</strong>Kelas berhasil Diupdate
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');

		redirect('Manajemen_kelas/index');
	
	}






	

	
}