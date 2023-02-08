<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Model {

	public function ifMember($user,$pass){

        $this->db->where('nom', $user);  
        $this->db->where('pwd', $pass);  
        $query = $this->db->get('user');  
  
        $valiny = array();

        if ($query->num_rows() == 1){  
            $row = $query->row();
            $id = $row ->idUser;
            $isadmin = $row ->isAdmin;

            $valiny['etat'] = 1;
            $valiny['id'] = $id;
            $valiny['isadmin'] = $isadmin;
            // return 1;  
        } else {  
            $valiny['etat'] = 0;
            // return 0;  
        }  
        return $valiny;
	}	

    public function verifyIfEmpty($array){
        $vide=array();
        foreach($array as $a => $val){
            if($array[$a] == ''){
                $vide[]=$a;
            }
        }
        if(count($vide) != 0){
            $message="vide :";
            for ($i=0; $i < count($vide)-1; $i++) { 
                $message = $message.' '.$vide[$i].' , ';
            }
            $message = $message.' '.$vide[count($vide)-1];
            throw new Exception($message);
        } else {
            echo "mety";
        }
    }

    public function inserer($data){
        try{
            $this->verifyIfEmpty($data);
            $sql = "INSERT INTO user(idUser,nom,pwd,isAdmin) VALUES(NULL,%s,%s,0)";
            $sql = sprintf($sql,$this->db->escape($data['user']),$this->db->escape($data['pass']));
            $this->db->query($sql);
        } catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function insererCategorie($data){

        if($data['nom'] != null){
            $sql = "INSERT INTO categorie VALUES(NULL,%s)";
            $sql = sprintf($sql,$this->db->escape($data['nom']));
            $this->db->query($sql);
        } else {
            throw new Exception("misy vide ao");
        }
    }

    public function modifierCategorie($data){

        if($data['nom'] != null){
            $sql = "UPDATE categorie set nom = '%s' WHERE idCategorie = '%s' ";
            $sql = sprintf($sql,$data['nom'],$data['idCategorie']);
            $this->db->query($sql);
        } else {
            throw new Exception("misy vide ao");
        }
    }

    public function getAllCategorie(){
        $query = $this->db->query('select * from categorie');
        $valiny = array();

        foreach($query->result_array() as $val){
                $valiny[] = $val;
        }

        return $valiny;
    }

    

    public function getCategorieById($idcat){
       
        $sql="SELECT * FROM categorie WHERE idCategorie='%s'";
        $sql=sprintf($sql,$idcat);
        $query = $this->db->query($sql);
        $dbAll = $query->row_array();

        return $dbAll;
    }

    public function addObjet($nom, $description, $prix, $idUser,$path_img,$idcategorieTableau){
        // $idcategorieTableau =>tableau de idcategorie
        try {
            if (isset($nom) && isset($description) && isset($prix) && isset($idUser) && isset($path_img) && isset($idcategorieTableau)) {
                if ($nom!=null && $description!=null && $prix!=null && $idUser!=null && $path_img!=null && $idcategorieTableau[0]!=null) {
                    $sql="INSERT INTO Objet VALUES(null,'%s','%s','%s','%s')";
                    $sql=sprintf($sql,$nom,$description,$prix,$idUser);
                    $this->db->query($sql);

                    $sql1="SELECT idObjet FROM Objet ORDER BY idObjet DESC LIMIT 1";
                    $query = $this->db->query($sql1);
                    $id_obj = $query->row_array();
                    $id_object=$id_obj['idObjet'];

                    for ($i=0; $i < count($idcategorieTableau) ; $i++) { 
                        $sqlCateg="INSERT INTO Objet_Categorie VALUES(null,'%s','%s')";
                        $sqlCateg=sprintf($sqlCateg,$idcategorieTableau[$i],$id_object);
                        $this->db->query($sqlCateg);
                    }

                    $sql2="INSERT INTO sary VALUES(null,'%s','%s')";
                    $sql2=sprintf($sql2,$path_img,$id_object);
                    $this->db->query($sql2);
                }else {
                    throw new Exception("Les champs ne doivent pas etre vides");
                }
            }else {
                throw new Exception("Les champs ne doivent pas etre vides");
            }

        } catch (Exception $e) {
            throw $e;
        }
    }

}
