<?php 



class Err_404 extends CI_Controller{

public function __construct() {
		parent::__construct();


		



    
	}

	public function index()
	{

		
		$this->load->view('templates/vt_header');	

		$this->load->view('v_error_404');	
		$this->load->view('templates/vt_footer');	

		
		
	}


	
}