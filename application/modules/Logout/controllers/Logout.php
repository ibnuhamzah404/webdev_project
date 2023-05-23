<?php 


class Logout extends CI_Controller{

	public function out(){
		$this->session->sess_destroy();
		
		redirect('Login');
	}


}