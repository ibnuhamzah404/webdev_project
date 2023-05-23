<?php 
class Admin_form_wa extends CI_Controller{

public function __construct() {
		parent::__construct();


		
	if (empty($this->session->userdata('nama')) || $this->session->userdata('role_level') == 'siswa') {
		redirect('Login/');
	}


    $this->load->model('M_admin_form_wa'); 
	}

	public function index()
	{
		
		$data['data_form_wa'] = $this->M_admin_form_wa->get_data('form_wa', $id)->result();
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_admin_form_wa', $data);	
		$this->load->view('templates/vt_footer');	

		
		
	}

		public function delete_data($id){
		$kondisi = array('id' => $id);
		$this->M_admin_form_wa->delete_data($kondisi, 'form_wa');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data!</strong> siswa berhasil dihapus
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
			redirect('Admin_form_wa/index');
	}



	
}