<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usercontroller extends CI_Controller {
	public function index(){
		$this->load->view('login');
	}		

	public function client(){
		$this->load->view('client');
	}

	public function signup(){
		$this->load->view('signup');
	}
}


?>