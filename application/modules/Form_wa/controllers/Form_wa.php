<?php 



class Form_wa extends CI_Controller{


	public function __construct() {
		
		parent::__construct();


    	$this->load->model('M_form_wa'); 
	
	}


	 public function data_wa(){

	 
    	$nama = $this->input->post('nama');
    	$no_wa = $this->input->post('no_wa');
 		
 			$substr_no_wa = substr($no_wa,1);
 			$new_no_wa = "62" . strval($substr_no_wa ); 

 		
		$data = array(
	
			'nama' => $nama,
			'no_wa'  => $new_no_wa
		
					
		);

		return $data; 
			
	}

	public function index()
	{
		
		$this->load->view('templates/vt_header');
		$this->load->view('v_form_wa');

	}

	public function input_data(){
	$this->M_form_wa->input_data($this->data_wa(), 'form_wa');
	 $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Pesan anda telah terkirim!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
	redirect('Form_wa/index');
	

	}


	
	
}