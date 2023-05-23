<?php 



class Varkquiz extends CI_Controller{

public function __construct() {
		parent::__construct();


    $this->load->model('M_varkquiz'); 
	}

	public function index()
	{
		$data['jum_soal'] = $this->M_varkquiz->get_count('vark');
		$data['vark'] = $this->M_varkquiz->get_data('vark')->result();
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vs_sidebar');	
		$this->load->view('v_varkquiz', $data);	
		$this->load->view('templates/vt_footer');

	}


	

	public function input_data(){
		$kondisi = $this->session->userdata('username');
		$data = $this->session->userdata('username');
		$id_siswa = $this->M_varkquiz->get_id_siswa($data)->result();
		
		$arr = json_decode(json_encode($id_siswa), true);
		 
		$id = array_shift($arr[0]);

		$jawaban = $this->input->post('pg');
		$counts = array_count_values($jawaban);
		$max_val = max($counts);
		$rst  = array_search(max($counts), $counts);
		
		


		if (empty($counts['V'])) {
			$val_v = 0;	
		}else{
			$val_v = $counts['V'];
		}


		if (empty($counts['A'])) {
			$val_a = 0;	
		}else{
			$val_a = $counts['A'];
		}


		if (empty($counts['R'])) {
			$val_r = 0;	
		}else{
			$val_r = $counts['R'];
		}


		if (empty($counts['K'])) {
			$val_k = 0;	
		}else{
			$val_k = $counts['K'];
		}

		
		




		$data = array(
			'id_siswa' => $id,
			'visual_val' => $val_v,
			'audio_val'  => $val_a,
			'read_write_val' => $val_r,
			'kinetic_val'  => $val_k,
			'result' => $rst

		);

		$gaya_belajar = '';
		if ($rst == 'V') {
			$gaya_belajar = 'Visual';
		}elseif ($rst== 'A') {
			$gaya_belajar = 'Audio';
		}elseif ($rst == 'R') {
			$gaya_belajar = 'Read/Write';
		}elseif ($rst == 'K') {
			$gaya_belajar = 'Kinetic';
		}

		$this->M_varkquiz->input_data($data, 'hasil_vark');
		$this->session->set_flashdata('pesan', '<div class="form-group">
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%;" >
        Selamat anda sudah mengerjakan soal vark, Gaya belajar anda cenderung ke arah <b>' . $gaya_belajar. ' </b> Silakan lihat materi anda!
          <button type="button" class="close" data-dismiss="alert" style="padding: 0; margin: 0; width: 30px;"aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
		redirect('Sdashboard');
	}



	public function replace_kuis($id){
		$data['jum_soal'] = $this->M_varkquiz->get_count('vark');
		$data['vark'] = $this->M_varkquiz->get_data('vark')->result();
		$data['id_siswa'] = $id;
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vs_sidebar');	
		$this->load->view('vr_varkquiz', $data);	
		$this->load->view('templates/vt_footer');
	}


	public function replace_kuis_aksi(){
		$kondisi = $this->session->userdata('username');
		$data = $this->session->userdata('username');
		
		$ids = $this->input->post('id_siswa');
		
		$jawaban = $this->input->post('pg');
		$counts = array_count_values($jawaban);
		$max_val = max($counts);
		$rst  = array_search(max($counts), $counts);
		
		


		$val_v = $counts['V'];
		$val_a = $counts['A'];
		$val_r = $counts['R'];
		$val_k = $counts['K'];
		

		



		$data = array(
			'id_siswa' => $ids,
			'visual_val' => $val_v,
			'audio_val'  => $val_a,
			'read_write_val' => $val_r,
			'kinetic_val'  => $val_k,
			'result' => $rst

		);

	
		$gaya_belajar = '';
		if ($rst == 'V') {
			$gaya_belajar = 'Visual';
		}elseif ($rst== 'A') {
			$gaya_belajar = 'Audio';
		}elseif ($rst == 'R') {
			$gaya_belajar = 'Read/Write';
		}elseif ($rst == 'K') {
			$gaya_belajar = 'Kinetic';
		}

		$where = array('id_siswa' => $ids);

		$this->M_varkquiz->update_data($data, 'hasil_vark' ,$where);
		$this->session->set_flashdata('pesan', '<div class="form-group">
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%;" >
        Selamat anda sudah mengerjakan soal vark, Gaya belajar anda cenderung ke arah <b>' . $gaya_belajar. ' </b> Silakan lihat materi anda!
          <button type="button" class="close" data-dismiss="alert" style="padding: 0; margin: 0; width: 30px;"aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
		redirect('Sdashboard');
	}


	// public function tes(){
		
		
	// $jawaban = $this->input->post('pg');
	// print_r($jawaban);
	// $counts = array_count_values($jawaban);
	// echo $counts['R'];
	

		
		
	// 	// echo $hasil;

	// 	// 
	// 	// echo $hasil;
	// 	// $data = array('tes' => $hasil);

	// 	// print_r($data);
		
	// }
}