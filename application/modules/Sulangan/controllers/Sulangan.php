<?php 

class Sulangan extends CI_Controller{

public function __construct() {
		parent::__construct();


    $this->load->model('M_sulangan'); 
	}

	public function index()
	{
		$dt = $this->session->userdata('username');
		$id_siswa = $this->M_sulangan->get_id_siswa($dt)->result();
	  $arr = json_decode(json_encode($id_siswa), true);
		$ids = array_shift($arr[0]);

		$jurusan_siswa = $this->M_sulangan->get_one_row('siswa', $ids)->result();
		$arrJur = json_decode(json_encode($jurusan_siswa), true);
		$jurs = array_shift($arrJur[0]);
		
		$data['data_tryout'] = $this->M_sulangan->get_tryout('tryout', $jurs)->result();
		

		$data['status_ulangan_tps']   = $this->M_sulangan->get_status_hasil_ulangan('hasil_ulangan', $ids, 'TPS')->result();
		$data['status_ulangan_tka']   = $this->M_sulangan->get_status_hasil_ulangan('hasil_ulangan', $ids, 'TKA')->result();
		$data['data_ulangan_tka'] = $this->M_sulangan->get_publikasi('susun_to', 'publikasi', $jurs, 'TKA')->result();
		$data['data_ulangan_tps'] = $this->M_sulangan->get_publikasi('susun_to', 'publikasi', $jurs, 'TPS')->result();

		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vs_sidebar');	
		$this->load->view('v_daftar_ulangan', $data);	
		$this->load->view('templates/vt_footer');
	}

	public function detail_ulangan($id_ulangan, $id_to)
	{$dt = $this->session->userdata('username');
		 $id_siswa = $this->M_sulangan->get_id_siswa($dt)->result();
	    $arr = json_decode(json_encode($id_siswa), true);
		$ids = array_shift($arr[0]);

	

		$data['cek'] = $this->M_sulangan->get_hasil_ulangan('hasil_ulangan',$id_to, $ids);		

		$data['data_ulangan'] = $this->M_sulangan->get_data('susun_to', $id_to)->result();
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vs_sidebar');	
		$this->load->view('v_detail_ulangan', $data);	
		$this->load->view('templates/vt_footer');
	}


	public function pembahasan_soal($id_ulangan, $id_soal=1, $id_to=false){
	 error_reporting(0); 
 
		$dt = $this->session->userdata('username');
		 $id_siswa = $this->M_sulangan->get_id_siswa($dt)->result();
	    $arr = json_decode(json_encode($id_siswa), true);
		$ids = array_shift($arr[0]);

		
			$data['id_ulangan'] = $id_ulangan;

			$data['jawaban_user'] = $this->M_sulangan->get_jawaban_user('jawaban_sementara', $id_to, $id_soal, $ids)->jawaban;


			$data['data_soal'] = $this->M_sulangan->getOne('soal_ulangan', $id_ulangan, $id_soal)->result();
			$data['jum_data'] =$this->M_sulangan->getRow('soal_ulangan', $id_ulangan);
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vs_sidebar');	
		$this->load->view('v_pembahasan', $data);	
		$this->load->view('templates/vt_footer');
	}

		

	public function mulai_ulangan($id_ulangan, $id_soal, $id_to){

			$dt = $this->session->userdata('username');
		 $id_siswa = $this->M_sulangan->get_id_siswa($dt)->result();
	   $arr = json_decode(json_encode($id_siswa), true);
		$ids = array_shift($arr[0]);

			$data = array(
			'id_ulangan' => $id_to,
			'id_siswa'  => $ids,
			'waktu'     => time()
 

			

		);


				$cek_waktu = $this->M_sulangan->cek_waktu('waktu_ujian_sementara', $id_to, $ids);

				if($cek_waktu == FALSE){
						$this->M_sulangan->input_data($data, 'waktu_ujian_sementara', 'id');
				}

			
      	// print_r($data);
      
      $data['waktu'] = $this->M_sulangan->get_waktu('waktu_ujian_sementara', $id_to, $ids);

			$data['data_soal'] = $this->M_sulangan->getOne('soal_ulangan', $id_ulangan, $id_soal)->result();
			$data['jum_data'] =$this->M_sulangan->getRow('soal_ulangan', $id_ulangan);
			$pil = $this->input->post('pg');


			$data['data_ulangan'] = $this->M_sulangan->get_data('susun_to', $id_to)->result();
		  $data['id_ulangan'] = $id_ulangan;


	  $this->session->set_userdata('starttime', time());
	  $this->session->set_userdata('waktu', '30');
		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vs_sidebar');	
		$this->load->view('v_sulangan', $data);	
		$this->load->view('templates/vt_footer');
	}


	public function finish_ujian($id_ulangan){
		

		$dt = $this->session->userdata('username');
		 $id_siswa = $this->M_sulangan->get_id_siswa($dt)->result();
	    $arr = json_decode(json_encode($id_siswa), true);
		$ids = array_shift($arr[0]);
		$kalimat = $this->input->post('temp_jawaban');
		$data = explode("," , $kalimat);
		$id_to = $this->input->post('id_to');
		$min_no =  $this->M_sulangan->get_min_no($id_ulangan)->result();
   		$arr_min_no =  json_decode(json_encode($min_no), true);
   			$single_min_no = array_shift($arr_min_no[0]);
   			

   $no = $single_min_no;

   	$benar = 0;
   			$salah = 0;
   			$kosong =0;
   			$result =0;
		foreach($data as $dt ){
				

			// true / false cek jawaban
			// $com_jawaban = $this->M_sulangan->co_jawaban('sal_ulangan', $id_ulangan, $no, $dt);
   			$com_jawaban = $this->M_sulangan->compare_jawaban('soal_ulangan', $id_ulangan, $no, $dt);

   			// dapat bobot nilai
   			$bobot_nilai = $this->M_sulangan->get_bobot_nilai( $no, $id_ulangan)->result();
   			$arr_bobot_nilai =  json_decode(json_encode($bobot_nilai), true);
   			$single_bobot_nilai = array_shift($arr_bobot_nilai[0]);



   			// jumlah soal
   			$jumlah_soal =  $this->M_sulangan->jumlah_soal('soal_ulangan', $id_ulangan)->result();
   			$arr_jumlah_soal =  json_decode(json_encode($jumlah_soal), true);
   			$single_jumlah_soal = array_shift($arr_jumlah_soal[0]);

   
   			if($com_jawaban == TRUE ){
   				$benar+=1;
   				$result = $result + $single_bobot_nilai;
   			
   			}elseif($com_jawaban == FALSE && $dt !== ''){
					$salah+=1;
				
				
   			}elseif($dt == ''){
   				$kosong+=1;

   			}

   			$data = array(
					'id_ulangan' => $id_to,
					'no_soal' => $no,
					'jawaban' => $dt,
					'id_siswa' => $ids
				);

   			

				$no+=1;

				$cek_jawaban = $this->M_sulangan->cek_pg('jawaban_sementara', $id_to, $ids, $no);

				if($cek_jawaban == false){
						$this->M_sulangan->input_data($data, 'jawaban_sementara', 'id');
				}
				else{
					 $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>HORREEee!</strong>Ujian telah selesai, anda dapat melihat hasilnya langsung!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
      	redirect('Sulangan');
				}

			
		}
	
		$data_result = array(
			'id_ulangan' => $id_ulangan,
					'id_siswa' => $ids,
					'id_to'    => $id_to,
					'status' => 'Y',
					'soal_benar' => $benar,
					'soal_salah' => $salah,
				    'soal_kosong' => $single_jumlah_soal - ($benar + $salah),
					'jum_soal'   => $single_jumlah_soal,
					'nilai'      => $result
		);
	
		$this->M_sulangan->input_data($data_result, 'hasil_ulangan', 'id_hasil_ulangan');
		 $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>HORREEee!</strong>Ujian telah selesai, anda dapat melihat hasilnya langsung!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
      	redirect('Sulangan');

		// $data['cek'] = $this->M_sulangan->get_hasil_ulangan('hasil_ulangan', $id_to, $ids);		

		// $data['data_ulangan'] = $this->M_sulangan->get_data('susun_to', $id_ulangan)->result();

		// $this->load->view('templates/vt_header');	
		// $this->load->view('templates/vs_sidebar');	
		// $this->load->view('v_sulangan', $data);	
		// $this->load->view('templates/vt_footer');

		
	}

	public function next_ulangan($id_ulangan, $id_soal){
		// $data['data_soal'] = $this->M_sulangan->getOne('soal_ulangan', $id_ulangan, $id_soal)->result();

		


		// 	$data['jum_data'] =$this->M_sulangan->getRow('soal_ulangan', $id_ulangan);
			$pil = $this->input->post('pg');




		// $data['data_ulangan'] = $this->M_sulangan->get_data('ulangan', $id_ulangan)->result();
	 //  $data['id_ulangan'] = $id_ulangan;

	 //  $dt = $this->session->userdata('username');
		//  $id_siswa = $this->M_sulangan->get_id_siswa($dt)->result();
	 //    $arr = json_decode(json_encode($id_siswa), true);
		// $ids = array_shift($arr[0]);
		
	 $url =  base_url(uri_string());
            $keywords = explode('/', $url);


           
           
    
 		
 		$data = array(

 		
 			'jawaban' => $pil
 			


 		);

 		$temp = $id_soal+1;
 	
 		
 	// 	$this->session->set_userdata('starttime', time());
	 //  $this->session->set_userdata('waktu', '30');
		// $this->load->view('templates/vt_header');	
		// $this->load->view('templates/vs_sidebar');	
		// $this->load->view('v_sulangan', $data);	
		// $this->load->view('templates/vt_footer');
	}


	public function lihat_score($id_ulangan, $id_to){
		
		$dt = $this->session->userdata('username');
		 $id_siswa = $this->M_sulangan->get_id_siswa($dt)->result();
	    $arr = json_decode(json_encode($id_siswa), true);
		$ids = array_shift($arr[0]);

		$data['data_score'] = $this->M_sulangan->get_score('hasil_ulangan', $id_to, $ids)->result();


		$this->load->view('templates/vt_header');	
		$this->load->view('templates/vs_sidebar');	
		$this->load->view('v_score', $data);	
		$this->load->view('templates/vt_footer');
	}

	
	public function cek_ujian(){
		$ulangan = $this->input->post('id_ulangan');
		$pil = $this->input->post('pg');
		$id = $this->input->post('pilihan');
		$jum_soal =  $this->M_sulangan->get_jawaban('soal_ulangan', $ulangan);

			
		$benar =0;
		$salah =0;
		$kosong = 0;

		if (empty($pil)) {
			$hasil = 0;
		}else{
		foreach ($pil as $index => $pl) {
			
			$cek = $this->M_sulangan->get_jawaban('soal_ulangan',$id[$index] , $pl);
				if($cek){
				$benar++;
			}else{
				$salah++;
			}
			
		}
	}
	 	$kosong = $jum_soal - ($benar + $salah);
		// echo 'kosong : ' . $kosong;echo "<br>";
		// echo 'benar : '. $benar; echo "<br>";
		// echo 'salah : ' . $salah; echo "<br>";
		$score = 100/$jum_soal*$benar;
		// echo $score; echo "<br>";

        $hasil = number_format($score,1);
         // echo $hasil;
		
	
        $dt = $this->session->userdata('username');
	
	    $id_siswa = $this->M_sulangan->get_id_siswa($dt)->result();
	    $arr = json_decode(json_encode($id_siswa), true);
		$ids = array_shift($arr[0]);


		$data = array(
			'id_ulangan' => $ulangan,
			'id_siswa'  => $ids,
			'status'   => 'Y',
			'soal_benar'  => $benar,
			'soal_salah'  => $salah,
			'soal_kosong'  => $kosong,
			'jum_soal'  => $jum_soal,
			'nilai'   => $hasil
 

			

		);
				
      	// print_r($data);
      	$this->M_sulangan->input_data($data, 'hasil_ulangan', 'id_hasil_ulangan');
      	 $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>HORREEee!</strong>Ujian telah selesai, anda dapat melihat hasilnya langsung!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

      </div>');
      	redirect('Sulangan');
					
	}




}
