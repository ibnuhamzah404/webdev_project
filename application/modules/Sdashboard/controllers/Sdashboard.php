<?php 



class Sdashboard extends CI_Controller{

	public function __construct() {
		parent::__construct();

		if (empty($this->session->userdata('nama')) || $this->session->userdata('role_level') == "guru") {
			redirect('Login/');
		}


    	$this->load->model('M_sdashboard'); 
	}

	public function index()
	{

		$dt = $this->session->userdata('username');
	    $id_siswa = $this->M_sdashboard->get_id_siswa($dt)->result();
	    $arr = json_decode(json_encode($id_siswa), true);
		 
		$id = array_shift($arr[0]);
		$stat_vark = $this->M_sdashboard->status_vark($id, 'hasil_vark');

		$a = $this->M_sdashboard->get_data_b('siswa', $id)->result();
	   	$b = json_decode(json_encode($a), true);
	   	$c = array_shift($b[0]);

		
		$data['total_tugas'] = $this->M_sdashboard->get_w('tugas', $c);

		$data['total_ujian'] = $this->M_sdashboard->get_w('ulangan', $c);
		$data['id_siswa'] = $id;

		if($stat_vark==FALSE){
			redirect('Varkquiz');
		}else{
			$get_vark = $this->M_sdashboard->get_vark('hasil_vark', $id)->result();

		$vark = json_decode(json_encode($get_vark), true);
		
		$vr = array_shift($vark[0]);
		$data['total_materi'] = $this->M_sdashboard->get_count('materi', $vr, $c);
		}

		
		$data['gaya_belajar'] = $vr;


	    
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vs_sidebar');	
		$this->load->view('v_sdashboard', $data);	
		$this->load->view('templates/vt_footer');

		
		
		
	}
}