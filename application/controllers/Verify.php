<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verify extends CI_Controller {

        

        public function index(){
                $this->load->view('login');
        }

	public function verifyLogin(){
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                $this->load->model('data');
                $etats = $this->data->ifMember($username,$password);

                if($etats['etat'] == 1){
                        $this->session->set_userdata('iduser',$etats['id']);
                        $this->session->set_userdata('isadmin',$etats['isadmin']);
                        echo json_encode(array("statuscode" => 200));
                } else {
                        echo json_encode(array("statuscode" => 300));
                }                
	}	

        public function insertUser(){

                $data = array();
                $data['user'] = $this->input->post('username');
                $data['pass'] = $this->input->post('password');

                $this->load->model('data');
                $this->data->inserer($data);
              
	}




}
