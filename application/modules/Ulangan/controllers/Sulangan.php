<?php 



class Sulangan extends CI_Controller{

public function __construct() {
		parent::__construct();


    $this->load->model('M_suangan'); 
	}

	public function index()
	{
		$data['data_ulangan'] = $this->M_sulangan->get_data('ulangan')->result();
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vs_sidebar');	
		$this->load->view('v_sulangan', $data);	
		$this->load->view('templates/vt_footer');

	}

}
