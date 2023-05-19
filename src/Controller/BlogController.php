<?php

namespace App\Controller;

use App\Manager\AvisManager;
use App\Manager\BlogManager;
use App\Service\Session;
use App\Service\Form;

class BlogController extends AbstractController {

        public function index(){
         
            $smanager = new BlogManager;
            $blogs = $smanager->findAll();
            return $this->render("blog/home.php", [
                "blogs" => $blogs
               
            ]);
        }


        public function blog($id){
            $smanager = new BlogManager;
            $avismanager = new AvisManager;
            $avis = $avismanager->findAllAvisByBlog($id);
            $post = $smanager->findOneById($id);
            return $this->render("blog/post.php", [
                "post" => $post,
                "avis" => $avis
            ]);
        }


        public function addBlog($id){
            $userId = Session::get("utilisateur")->getId();
            
            
            if(Form::isSubmitted()){
                $sujet = Form::getData("sujet", "text");
                $Avis = Form::getData("Avis", "text");
                if($sujet){
                    $manager = new AvisManager;
                    if($topicId = $manager->insertBlog($sujet, $userId, $id)){
                        $mmanager = new AvisManager();
                        if($mmanager->insertAvis($Avis, $userId, $topicId)){
                            $this->addFlash("success", "Votre sujet a bien été ajouté !!");
                            $this->redirect("?ctrl=Avis&action=Avis&id=$topicId");
                        }

                    }else $this->addFlash("error", "Problème de connexion de BDD !!!"); 
                }else $this->addFlash("notice", "Veuillez écrire votre sujet !!");

            }else{ 
                $this->addFlash("notice", "Veuillez Valider votre sujet !!");
                return $this->render("forum/sujet.php");
            }
        
            return $this->render("forum/sujet.php");

        }

        public function deleteBlog($id){
            $smanager = new BlogManager();
            if($smanager->deleteBlog($id)){
                $this->addFlash("success", "Votre sujet est bien supprimé maintenant !!!");
                $this->redirect("?ctrl=forum&action=index");
            }else{
                $this->addFlash("error", "Erreur BDD !!!");
                $this->redirect("?ctrl=forum&action=index");
            }
        }
    }