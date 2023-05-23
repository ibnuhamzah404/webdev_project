<?php 


Class Login Extends CI_Controller{

	public function __construct() {
		parent::__construct();


    $this->load->model('M_login'); 
	}
	public function index(){
		$this->load->view("templates/auth_header");
		$this->load->view("v_login");
		$this->load->view("templates/auth_footer");
	}


	public function login_aksi(){
		
		$role_level = $this->input->post('level');
		$username = $this->input->post('username');
		$password = $this->input->post('password');


		switch ($role_level) {
			case 'Admin':
				$cek_login = $this->M_login->cek_login($username, $password, 'admin');
				// $cek_status_n = $this->M_login->cek_status($username, $password, 'siswa','nonaktif');
				// $cek_status_p = $this->M_login->cek_status($username, $password, 'siswa', 'pending');
			
				if ($cek_login == FALSE) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"  style="width: 80%;">
				 	Maaf username dan password anda salah!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 0; margin: 0; width: 30px;">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
				redirect('Login/index');
				}
				
				else{
					$this->session->set_userdata('role_level', 'admin');
					$this->session->set_userdata('username',$cek_login->username);
					$this->session->set_userdata('nama', $cek_login->nama);

					
					redirect('Dashboard');
				}
				break;
				
			case 'Guru':
				
				$cek_login = $this->M_login->cek_login($username, $password, 'guru');
				$cek_status_n = $this->M_login->cek_status($username, $password, 'guru','nonaktif');
				if ($cek_login == FALSE) {
					$this->FlashData('danger','maaf password atau username anda salah!');
				redirect('Login/index');
				}elseif( $cek_status_n == TRUE){
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"  style="width: 80%;">
				 	Maaf akun anda dinonaktifkan, silakan hubungi admin!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 0; margin: 0; width: 30px;">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
				redirect('Login/index');
				}else{
					
					$this->session->set_userdata('nama', $cek_login->nama);
					$this->session->set_userdata('username', $cek_login->username);
					$this->session->set_userdata('role_level', 'guru');
					redirect('Dashboard');
				}
				break;
			case 'Siswa':
				$cek_login = $this->M_login->cek_login($username, $password, 'siswa');
				// $cek_status_n = $this->M_login->cek_status($username, $password, 'siswa','nonaktif');
				// $cek_status_p = $this->M_login->cek_status($username, $password, 'siswa', 'pending');
			
				if ($cek_login == FALSE) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"  style="width: 80%;">
				 	Maaf username dan password anda salah!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 0; margin: 0; width: 30px;">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
				redirect('Login/index');
				}
				// elseif( $cek_status_n == TRUE){
				// 		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"  style="width: 80%;">
				//  	Maaf akun anda dinonaktifkan, silakan hubungi admin!
				//   <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 0; margin: 0; width: 30px;">
				//     <span aria-hidden="true">&times;</span>
				//   </button>
				// </div>');
				// redirect('Login/index');
				// }elseif( $cek_status_p == TRUE){
				// 		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"  style="width: 80%;">
				//  	Maaf akun anda belum diaktivasi, silakan hubungi admin!
				//   <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 0; margin: 0; width: 30px;">
				//     <span aria-hidden="true">&times;</span>
				//   </button>
				// </div>');
				// redirect('Login/index');
				// }
				else{
					$this->session->set_userdata('role_level', 'siswa');
					$this->session->set_userdata('username',$cek_login->username);
					$this->session->set_userdata('nama', $cek_login->nama);

					
					redirect('Sdashboard');
				}
				break;
			
			default:
				# code...
				break;
		}

		// $data = array(
		// 	'role_level' => $role_level,
		// 	'username' => $username,
		// 	'password' => $password
		// );

		
		// return $data;
		

	}


	public function FlashData($type, $message){

		$text = '<div class="alert alert-'.$type . ' alert-dismissible fade show" role="alert"  style="width: 80%;">'. $message .'
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 0; margin: 0; width: 30px;">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';

		$this->session->set_flashdata('pesan', $text);
	}

	

}