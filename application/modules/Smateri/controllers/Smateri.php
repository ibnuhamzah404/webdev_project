<?php 



class Smateri extends CI_Controller{

	public function __construct() {
		parent::__construct();

		


    	$this->load->model('M_smateri'); 
	}

	public function index(){
		// get id siswa
		$dt = $this->session->userdata('username');
	    $id_siswa = $this->M_smateri->get_id_siswa($dt)->result();
	    $arr = json_decode(json_encode($id_siswa), true);
		$id = array_shift($arr[0]);
		
		// get result vark value
		$vark_val = $this->M_smateri->get_data_w('hasil_vark', $id)->result();
	    $split_val = json_decode(json_encode($vark_val), true);
	    $res_val = array_shift($split_val[0]);
	   
	    // get materi berdasarkan vark
	   

	    
	    // get kelas siswa 
	   	$a = $this->M_smateri->get_data_b('siswa', $id)->result();
	   	$b = json_decode(json_encode($a), true);
	   	$c = array_shift($b[0]);
	  
	   	$data['data_materi'] = $this->M_smateri->get_data_j('materi', $res_val, $c)->result();
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vs_sidebar');	
		$this->load->view('v_smateri', $data);	
		$this->load->view('templates/vt_footer');

		
		
		
	}


	public function download_materi($id){
		$this->load->helper('download');
		$fileMateri = $this->M_smateri->download_materi($id);
		$file = 'assets/upload/'.$fileMateri['nama_file'];
		force_download($file, NULL);
	}

}