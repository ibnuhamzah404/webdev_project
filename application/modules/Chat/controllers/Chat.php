<?php 

class Chat extends CI_Controller{


	public function __construct() {
		parent::__construct();
		$this->load->model('M_chat'); 
  	
	}

	public function index(){
		$data['data_chat'] = $this->M_chat->get_data('chat')->result();
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vt_sidebar');	
		$this->load->view('Chat', $data);	
		$this->load->view('templates/vt_footer');	
	}



	public function kirimPesan(){
		$pesan = $this->input->post('pesan');
		$username = $this->session->userdata('username');
		$role_lv = $this->session->userdata('role_level');
	    $id_guru = $this->M_chat->get_id_guru($username)->result();
	    $arr = json_decode(json_encode($id_guru), true);
		$id = array_shift($arr[0]);
		ini_set('date.timezone', 'Asia/Jakarta');
		

		$data = array(
			'user' => $username, 
			'pesan'  => $pesan,
			'tanggal' => date("Y-m-d H:i:s"),
			'role_level' =>  $role_lv,
		);

	
		

		$this->M_chat->input_data($data, 'chat');


		
	}
}


