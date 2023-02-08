<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Echange extends CI_Model {

        public function proposerEchange($idObjet1, $idObjet2,$etat=0,$dateAcceptation=null){
            // idObjet1=idObjet de celui avec qui on propose un echange
            // idObjet2=idObjet de celui qui propose
            try {
                $sql="INSERT INTO echange VALUES(null,'%s','%s','%s','%s')";
                $sql=sprintf($sql,$idObjet1,$idObjet2,$etat,$dateAcceptation);
                $this->db->query($sql);
            } catch (Exception $e) {
                echo $e;
            }
        }

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

        public function listeProposeEchange($iduser1){
            // Retourne un tableau d'objet Echange
            try {
                // idObjet1 = idObjet an'le olona andefasana proposition ana echange
                // idObjet2 = ... an'le olona mandefa proposition
                // $sql="SELECT e.idEchange,idObjet1,idObjet2 AS idObjet_propose,e.Etat,dateAcceptation,nom AS nom_objet_propose,description,prix,idUser AS idUser_propose FROM echange AS e JOIN Objet AS o ON e.idObjet2=o.idObjet WHERE e.idObjet1='%s'";
                $sql="SELECT e.idEchange,idObjet1,o1.nom AS nom_obj1,o1.description AS desc_obj1,o1.prix AS prix_obj1,u1.iduser AS iduser_obj1,u1.nom AS username_obj1,idObjet2,o2.nom AS nom_obj2,o2.description AS desc_obj2,o2.prix AS prix_obj2,u2.idUser AS iduser_obj2,u2.nom AS username_obj2 FROM echange AS e
                INNER JOIN Objet AS o1 ON e.idObjet1=o1.idObjet
                INNER JOIN Objet AS o2 ON e.idObjet2=o2.idObjet
                INNER JOIN user AS u1 ON o1.iduser=u1.iduser
                INNER JOIN user AS u2 ON o2.iduser=u2.iduser WHERE u1.iduser='%s' AND (Etat!='-1' AND Etat!='1')";
                $sql=sprintf($sql,$iduser1);
                $query = $this->db->query($sql);
    
                $dbAll = array();
                
                $i=0;
                foreach($query->result_array() as $row){
                    $dbAll[$i]['sary1']=$this->getSaryObjet($row['idObjet1']);
                    $dbAll[$i]['sary2']=$this->getSaryObjet($row['idObjet1']);

                    $dbAll[$i]['idEchange']=$row['idEchange'];
                    $dbAll[$i]['idObjet1']=$row['idObjet1'];
                    $dbAll[$i]['nom_obj1']=$row['nom_obj1'];
                    $dbAll[$i]['desc_obj1']=$row['desc_obj1'];
                    $dbAll[$i]['prix_obj1']=$row['prix_obj1'];
                    $dbAll[$i]['iduser_obj1']=$row['iduser_obj1'];
                    $dbAll[$i]['username_obj1']=$row['username_obj1'];
                    $dbAll[$i]['idObjet2']=$row['idObjet2'];
                    $dbAll[$i]['nom_obj2']=$row['nom_obj2'];
                    $dbAll[$i]['desc_obj2']=$row['desc_obj2'];
                    $dbAll[$i]['prix_obj2']=$row['prix_obj2'];
                    $dbAll[$i]['iduser_obj2']=$row['iduser_obj2'];
                    $dbAll[$i]['username_obj2']=$row['username_obj2'];

                    $i++;
                }
                // return $dbAll;
            } catch (Exception $e) {
                echo $e;
            }
            return $dbAll;
        }

        public function refuserEchange($idEchange){
            try {
                $sql="UPDATE echange set Etat='-1',dateAcceptation=null WHERE idEchange='%s'";
                $sql=sprintf($sql,$idEchange);
                $this->db->query($sql);
            } catch (Exception $e) {
                echo $e;
            }
        }
        public function accepterEchange($idEchange,$iduser_objet1){
            // $iduser_objet1 = donnees de SESSION
            try {            
                $sql2="SELECT e.idEchange,idObjet1,o1.nom AS nom_obj1,o1.description AS desc_obj1,o1.prix AS prix_obj1,u1.iduser AS iduser_obj1,u1.nom AS username_obj1,idObjet2,e.Etat,e.dateAcceptation,o2.nom AS nom_obj2,o2.description AS desc_obj2,o2.prix AS prix_obj2,u2.idUser AS iduser_obj2,u2.nom AS username_obj2n FROM echange AS e
                INNER JOIN Objet AS o1 ON e.idObjet1=o1.idObjet
                INNER JOIN Objet AS o2 ON e.idObjet2=o2.idObjet
                INNER JOIN user AS u1 ON o1.iduser=u1.iduser
                INNER JOIN user AS u2 ON o2.iduser=u2.iduser WHERE idEchange='%s' AND u1.iduser='%s'";
                $sql2=sprintf($sql2,$idEchange,$iduser_objet1);
    
                $query = $this->db->query($sql2);
                $dbAll = $query->row_array();
    
                $sql3="UPDATE Objet set idUser='%s' WHERE idObjet='%s'";
                $sql3=sprintf($sql3,$dbAll['iduser_obj2'],$dbAll['idObjet1']);
                $sql4="UPDATE Objet set idUser='%s' WHERE idObjet='%s'";
                $sql4=sprintf($sql4,$iduser_objet1,$dbAll['idObjet2']);
                
                $this->db->query($sql3);
                $this->db->query($sql4);
    
                $sql="UPDATE echange set Etat='1',dateAcceptation=NOW() WHERE idEchange='%s'";
                $sql=sprintf($sql,$idEchange);
                $this->db->query($sql);
    
                $sql5="UPDATE echange set Etat='-1' WHERE idObjet1='%s' AND Etat!='1'";
                $sql5=sprintf($sql5,$dbAll['idObjet1']);
                $this->db->query($sql5);
    
                $sql6="INSERT INTO history_echange VALUES(null,'%s','%s','%s','%s',NOW())";
                $sql6=sprintf($sql6,$dbAll['idObjet1'],$dbAll['iduser_obj1'],$dbAll['idObjet2'],$dbAll['iduser_obj2']);
                $this->db->query($sql6);
            } catch (Exception $e) {
                echo $e;
            }
        }

    }

?>