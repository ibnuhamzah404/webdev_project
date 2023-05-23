<?php 
class Dashboard extends CI_Controller{

public function __construct() {
		parent::__construct();


		
	if (empty($this->session->userdata('nama')) || $this->session->userdata('role_level') == 'siswa') {
		redirect('Login/');
	}


    $this->load->model('M_dashboard'); 
	}

	public function index()
	{
		$data['total_guru'] = $this->M_dashboard->get_count('guru');
		$data['total_siswa'] = $this->M_dashboard->get_count('siswa');
			$data['total_admin'] = $this->M_dashboard->get_count('admin');
		
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_dashboard', $data);	
		$this->load->view('templates/vt_footer');	

		
		
	}


	
}