<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

        

    public function index(){
        $this->load->model('Objet');

        $data['listeObjet']=$this->Objet->listeObjet($_SESSION['iduser']);

        
        if($_SESSION['isadmin'] == 0){
            $this->load->view('header');
            $this->load->view('accueil',$data);
            $this->load->view('footer');
        } else {
            redirect('home/gerercategorie');
        }
        
        
        
    }

    public function logout(){
        $this->session->unset_userdata('iduser');
        $this->session->unset_userdata('isadmin');
        redirect('usercontroller');
    }

    public function demande(){

        $this->load->model('echange');
        $this->load->model('objet');

        $valiny = array();
        $valiny['proposition'] = $this->echange->listeProposeEchange($_SESSION['iduser']);

        $this->load->view('header');
        $this->load->view('demande',$valiny);
        $this->load->view('footer');
    }

    public function detail(){
        $idobj = $_GET['id'];
        $this->load->model('Objet');
        $data['detail']=$this->Objet->getObjetByIdObjet($idobj);
        $data['obj']=$this->Objet->getAllObjetById($_SESSION['iduser']);
        $data['sary']=$this->Objet->getAllSaryObjet($idobj);

        $this->load->view('header');
        $this->load->view('detail',$data);
        $this->load->view('footer');
    }

    public function mylist(){
        $this->load->model('Objet');

        $data['mesObjets']=$this->Objet->getAllObjetById($_SESSION['iduser']);

        $this->load->view('header');
        $this->load->view('listeetajout',$data);
        $this->load->view('footer');
    }

    public function insertobjet(){
        $this->load->view('header');
        $tab['categorie'] = $this->categorie();
        $this->load->view('insertobjet',$tab);
        $this->load->view('footer');
    }

    public function categorie(){
        $this->load->model('data');

        return $this->data->getAllCategorie();
    }

    public function mandefa(){

        // print_r($_FILES);
		$this->load->helper('url');
  

        $config['upload_path']   = './assets/images/'; 
        $config['allowed_types'] = 'jpg|png|PNG|JPG|jpeg'; 
        $config['max_size']      = 20000; 
        $config['max_width']     = 10000; 
        $config['max_height']    = 10000;  
        $this->load->library('upload', $config);
        $this->load->library('upload',$config); 

        
        if($this->upload->do_upload('img')){ 
            // print_r($_FILES['img']['name']);
            return $_FILES['img']['name'];
        } else {
            throw new Exception("tsy mety le upload");
        }
    }

    public function finalinsertobjet(){
        $this->load->model('data');
        $path = $this->mandefa();
        $path = 'assets/images/'.$path;
        print_r($path);
        $this->data->addObjet($_POST['nom'],$_POST['desc'],$_POST['prix'],$_SESSION['iduser'],$path,$_POST['categ']);

        $this->load->helper('url');
        redirect('home/mylist');

    }

    public function proposerechange(){
        $this->load->model('echange');
        $this->echange->proposerEchange($_POST['idobj1'],$_POST['idobj2']);
        redirect('home');
    }

    //admin
    public function gerercategorie(){
        $this->load->model('data');

        $tab = array();

        $tab['categorie'] = $this->data->getAllCategorie();

        $this->load->view('header');
        $this->load->view('listecategorie',$tab);
        $this->load->view('footer');
    }

    public function formajoutcategorie(){
        $this->load->view('header');
        $this->load->view('ajoutcategorie');
        $this->load->view('footer');
    }

    public function validerajoutcategorie(){
        $this->load->model('data');
        $this->data->insererCategorie($_POST);
        redirect('home/gerercategorie');
    }

    public function validermodifiercategorie(){
        $this->load->model('data');
        $this->data->modifierCategorie($_POST);
        redirect('home/gerercategorie');
    }

    public function formmodifiercategorie(){
        $this->load->model('data');
        $tab['cat'] = $this->data->getCategorieById($_GET['idcat']);

        $this->load->view('header');
        $this->load->view('modifiercategorie',$tab);
        $this->load->view('footer');
    }

    public function accepterechange(){
        $this->load->model('echange');

        $this->echange->accepterEchange($_GET['idechange'],$_SESSION['iduser']);

        // redirect('home/demande');
    }

    public function refuserechange(){
        $this->load->model('echange');

        $this->echange->refuserEchange($_GET['idechange']);

        redirect('home/demande');
    }



}
