<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Objet extends CI_Model {

    public function getSaryObjet($idObjet=1){
        try {
            $sql="SELECT * FROM sary WHERE idObjet='%s' LIMIT 1";
            $sql=sprintf($sql,$idObjet);
            $query = $this->db->query($sql);
            $dbAll = $query->row_array();
            // return $dbAll;
        } catch (Exception $e) {
            echo $e;
        }
        return $dbAll;
    }

    public function getAllSaryObjet($idObjet){
        try {
            $sql="SELECT * FROM sary WHERE idObjet='%s'";
            $sql=sprintf($sql,$idObjet);
            $query = $this->db->query($sql);
            $dbAll = array();

            foreach($query->result_array() as $row){
                array_push($dbAll,$row);
            }
            // return $dbAll;
        } catch (Exception $e) {
            echo $e;
        }
        return $dbAll;
    }

    public function getStringCategorieById($idobjet){
        $query = $this->db->query(' select categorie.nom as nom from Objet join Objet_Categorie on Objet.idObjet = Objet_Categorie.idObjet join categorie on categorie.idCategorie=Objet_Categorie.idCategorie where Objet.idobjet = '.$idobjet);
        $valiny = array();

        foreach($query->result_array() as $val){
                $valiny[] = $val;
        }

        $str = "";

        foreach($valiny as $v){
            $str = $str.$v['nom'].", ";
        }



        return $str;
    }
    
    public function listeObjet($iduser){
        try {
            $query = $this->db->query("SELECT idObjet,o.nom AS nom_obj,o.description,o.prix,u.idUser,u.nom AS username,u.pwd AS user_pwd,u.isAdmin FROM Objet AS o JOIN user AS u ON o.iduser=u.iduser where o.iduser !=".$iduser);
            $dbAll = array();
            


            $i=0;
            foreach($query->result_array() as $row){
                $dbAll[$i]['sary']=$this->getSaryObjet($row['idObjet']);
                $dbAll[$i]['categ']=$this->getStringCategorieById($row['idObjet']);
                // array_push($dbAll,$row);
                
                $dbAll[$i]['idObjet']=$row['idObjet'];
                $dbAll[$i]['nom_obj']=$row['nom_obj'];
                $dbAll[$i]['description']=$row['description'];
                $dbAll[$i]['prix']=$row['prix'];
                $dbAll[$i]['idUser']=$row['idUser'];
                $dbAll[$i]['username']=$row['username'];
                $dbAll[$i]['user_pwd']=$row['user_pwd'];
                $dbAll[$i]['isAdmin']=$row['isAdmin'];
                $i++;
            }
            // return $dbAll;
        } catch (Exception $e) {
            echo $e;
        }
        return $dbAll;
    }

    public function getAllObjetById($iduser){
        try {
            $query = $this->db->query("SELECT idObjet,o.nom AS nom_obj,o.description,o.prix,u.idUser,u.nom AS username,u.pwd AS user_pwd,u.isAdmin FROM Objet AS o JOIN user AS u ON o.iduser=u.iduser where o.iduser=".$iduser);
            $dbAll = array();
            


            $i=0;
            foreach($query->result_array() as $row){
                $dbAll[$i]['sary']=$this->getSaryObjet($row['idObjet']);
                $dbAll[$i]['categ']=$this->getStringCategorieById($row['idObjet']);
                // array_push($dbAll,$row);
                
                $dbAll[$i]['idObjet']=$row['idObjet'];
                $dbAll[$i]['nom_obj']=$row['nom_obj'];
                $dbAll[$i]['description']=$row['description'];
                $dbAll[$i]['prix']=$row['prix'];
                $dbAll[$i]['idUser']=$row['idUser'];
                $dbAll[$i]['username']=$row['username'];
                $dbAll[$i]['user_pwd']=$row['user_pwd'];
                $dbAll[$i]['isAdmin']=$row['isAdmin'];
                $i++;
            }
            // return $dbAll;
        } catch (Exception $e) {
            echo $e;
        }
        return $dbAll;
    }

    public function getObjetByIdObjet($idobjet){
        try {
            $query = $this->db->query("SELECT idObjet,o.nom AS nom_obj,o.description,o.prix,u.idUser,u.nom AS username,u.pwd AS user_pwd,u.isAdmin FROM Objet AS o JOIN user AS u ON o.iduser=u.iduser where idobjet=".$idobjet);
            $dbAll = array();
            


            $i=0;
            foreach($query->result_array() as $row){
                $dbAll[$i]['sary']=$this->getSaryObjet($row['idObjet']);
                $dbAll[$i]['categ']=$this->getStringCategorieById($row['idObjet']);
                // array_push($dbAll,$row);
                
                $dbAll[$i]['idObjet']=$row['idObjet'];
                $dbAll[$i]['nom_obj']=$row['nom_obj'];
                $dbAll[$i]['description']=$row['description'];
                $dbAll[$i]['prix']=$row['prix'];
                $dbAll[$i]['idUser']=$row['idUser'];
                $dbAll[$i]['username']=$row['username'];
                $dbAll[$i]['user_pwd']=$row['user_pwd'];
                $dbAll[$i]['isAdmin']=$row['isAdmin'];
                $i++;
            }
            // return $dbAll;
        } catch (Exception $e) {
            echo $e;
        }
        return $dbAll;
    }


}
