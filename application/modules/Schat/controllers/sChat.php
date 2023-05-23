<?php 

class Schat extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('M_schat'); 
  	
	}

	public function index(){
		$data['data_chat'] = $this->M_schat->get_data('chat')->result();
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vs_sidebar');	
		$this->load->view('sChat', $data);	
		$this->load->view('templates/vt_footer');	
	}



	public function kirimPesan(){
		$pesan = $this->input->post('pesan');
		$username = $this->session->userdata('username');
		$role_lv = $this->session->userdata('role_level');
	    $id_siswa = $this->M_schat->get_id_siswa($username)->result();
	    $arr = json_decode(json_encode($id_siswa), true);
		$id = array_shift($arr[0]);


		$a = $this->M_schat->get_kelas($id)->result();
	   	$b = json_decode(json_encode($a), true);
	   	$c = array_shift($b[0]);
	   	ini_set('date.timezone', 'Asia/Jakarta');

		$data = array(
			'user' => $username, 
			'pesan'  => $pesan,
			'tanggal' => date("Y-m-d H:i:s"),
			'role_level' =>  $role_lv,
			'kelas'    => $c
		);

		
		$this->M_schat->input_data($data, 'chat');
		
	}
}