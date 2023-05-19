<?php
namespace App\Controller;

use App\Service\Form;
use App\Service\Session;
use App\Manager\UtilisateurManager;

class FormController extends AbstractController
{



    public function login()
    {
        if(Form::isSubmitted()){
            $credentials = Form::getData("credentials", "text");
            $password = Form::getData("password", "text");

            if($credentials && $password){
                $manager = new UtilisateurManager();
                if(($user = $manager->findByUsernameOrEmail($credentials, $credentials))
                    && password_verify($password, $user->getPass())){
                   
                        Session::set("utilisateur", $user);
                        $this->addFlash("text-success", "Bienvenue ".$user->getNom());
                        return $this->redirect("?ctrl=blog&action=index");
                    
                }
                else $this->addFlash("text-danger", "Mauvais identifiants ou mot de passe, réessayez !");
            }
            else $this->addFlash("text-danger", "Tous les champs doivent être remplis !");
        }
        return $this->render("security/login.php");
    }



    public function formContact()
    {
        if(Form::isSubmitted()){

            $nom = Form::getData("nom", "text");
            $entreprise = Form::getData("entreprise", "text");
            $telephone = Form::getData("telephone", "text");
            $message = Form::getData("message", "text");
            $email = Form::getData("email", "email");

          if($nom && $entreprise && $telephone && $message && $email){

            $to = "test@test.com";
            $subject = "Formulaire de contact".$nom;
            $messages = "Nom : ".$nom."\nEntreprise : ".$entreprise."\nTéléphone : ".$telephone."\nMessage : ".$message."\nEmail : ".$email;
            $headers = array(
                'From' => 'test@example.com',
                'Reply-To' => 'test@example.com',
                'X-Mailer' => 'PHP/' . phpversion()
            );
            if(mail($to, $subject, $messages, $headers)){
                $this->addFlash("text-success", "Votre message a bien été envoyé !!");
                return $this->render("form/success.php");
            }else{
                $this->addFlash("text-danger", "Problème d'envoi de mail !!");
                return $this->render("form/success.php");
            }
          }else{
            $this->addFlash("text-danger", "Tous les champs doivent être remplis !");    
            return $this->render("form/success.php");
          }
        }
    }



}