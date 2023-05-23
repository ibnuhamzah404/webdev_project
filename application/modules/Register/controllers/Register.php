<?php 


class Register Extends CI_Controller{
	public function __construct() {
		parent::__construct();


    $this->load->model('M_register');
    	$this->load->library('form_validation');
	}



	 public function data_siswa(){

	 
    	$nama = $this->input->post('nama');
    	$username = $this->input->post('username');
    	$tgl_lahir = $this->input->post('tgl_lahir');
 		$jenis_kelamin = $this->input->post('jenis_kelamin');
 		$email = $this->input->post('email');
 		$jurusan = $this->input->post('jurusan');
 		$password = $this->input->post('password');
		
 		
 		


 		
		$data = array(
		
			'nama' => $nama,
			'username' => $username,
			'tanggal_lahir' => $tgl_lahir,
			'jenis_kelamin' => $jenis_kelamin,
			'email'    => $email,
			'jurusan'    => $jurusan,
			
			'password'   => $password,
			'status' => 'pending'
		
		
					
		);		

	
		return $data;
   	}


	public function index(){
		$this->load->view('templates/auth_header');
		$this->load->view('v_register');
		$this->load->view('templates/auth_footer');
	}




	public function regis_aksi(){
		
		
        $this->form_validation->set_rules('password','password','required|min_length[5]');
        $this->form_validation->set_rules('confirm_password', 'konfirmasi password', 'required|matches[password]',
        	array('matches' => '%s dengan password berbeda')
        );



        $this->form_validation->set_message('required', '%s masih kosong, silakan isi!');
        $this->form_validation->set_message('min_length', '%s harus melebihi dari 5 huruf!');

        $this->form_validation->set_error_delimiters('<span class = "text-danger">' , '</span>');
	
		
 
		if($this->form_validation->run() != false){
			$this->M_register->input_data($this->data_siswa(), 'siswa');
			
			$this->session->set_flashdata('pesan', '<div class="form-group">
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 80%;" >
          Register anda telah berhasil, silakan login!..
          <button type="button" class="close" data-dismiss="alert" style="padding: 0; margin: 0; width: 30px;"aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');


			redirect('Login/');
		}else{
			$this->index();
		}

		
		
		
		
	}


	public function rules(){
		
	}
	 

}
 


