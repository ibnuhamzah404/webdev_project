<?php 



class Cek_ujian extends CI_Controller{

public function __construct() {
		parent::__construct();



    $this->load->model('M_cek_ujian'); 
	}

	public function index()
	{
		
		
		
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('v_cek_ujian');	
		$this->load->view('templates/vt_footer');	



		
		
	}


	
}