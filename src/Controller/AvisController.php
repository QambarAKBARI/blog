<?php

namespace App\Controller;

use App\Manager\AvisManager;
use App\Manager\BlogManager;
use App\Service\Session;
use App\Service\Form;

class AvisController extends AbstractController {


        
        public function avis($id){
            $mmanager = new AvisManager;
            $Avis = $mmanager->findAllAvisByBlog($id);

            return $this->render("forum/Avis.php", [
                "Avis" => $Avis,
                "sujet_id" => $id
            ]);
        }


        public function addAvis($id){
            $userId = Session::get("user")->getId();
            
            if(Form::isSubmitted()){
                $text = Form::getData("Avis", "text");
                if($text){
                    $manager = new AvisManager;
                    $smanager = new BlogManager;
                    var_dump($manager);
                    var_dump($smanager);
                    die;
                    if($newAvis = $manager->insertAvis($text, $userId, $id)){

                        $this->addFlash("success", "Votre Avis a bien été envoyé !!");
                        $this->redirect("?ctrl=Avis&action=Avis&id=$id");
                    }else $this->addFlash("error", "Problème de connexion de BDD !!!"); 
                }else $this->addFlash("notice", "Veuillez écrire votre Avis !!");

            }else $this->addFlash("notice", "Veuillez Valider votre Avis !!");
            
            return $this->render("forum/Avis.php");

        }

        public function deleteAvis($id){
            $mmanager = new AvisManager();
            if($mmanager->deleteAvis($id)){
                $this->addFlash("success", "votre Avis a bien été supprimé !!");
                $this->redirect("?ctrl=Avis&action=Avis&id=$id");
            }else{
                $this->addFlash("error", "Problème de connexion de BDD !!!"); 
            }
        }
    }