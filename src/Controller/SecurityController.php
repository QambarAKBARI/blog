<?php
namespace App\Controller;

use App\Service\Form;
use App\Service\Session;
use App\Manager\UtilisateurManager;

class SecurityController extends AbstractController
{

    public function index()
    {
        return $this->render("security/index.php");
    }


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

    public function logout()
    {
        if(!$this->isGranted("ROLE_USER") && !$this->isGranted("ROLE_ADMIN") && !$this->isGranted("SUPER_ADMIN")) return false;
        
        Session::remove("utilisateur");
        $this->addFlash("text-success", "A bientôt !");
        return $this->redirect("?ctrl=security&action=login");
    }

    public function register()
    {
        if(Form::isSubmitted()){

            $nom = Form::getData("nom", "text");
            $prenom = Form::getData("prenom", "text");
            $email = Form::getData("email", "email");
            $pass1 = Form::getData("pass1", "default");
            $pass2 = Form::getData("pass2");
          
            if($nom && $email && $pass1){
                if($pass1 === $pass2){

                    $manager = new UtilisateurManager();

                    if(!$manager->findByUsernameOrEmail($nom, $email)){

                        $hash = password_hash($pass1, PASSWORD_ARGON2ID);

                        if($manager->insertUser($nom, $prenom, $email, $hash)){
                            $this->addFlash("text-success", "CA Y EST !!! T'es inscrit !!!");
                            return $this->redirect("?ctrl=security&action=login");
                        }
                        else $this->addFlash("text-danger", "erreur de BDD");
                    }
                    else $this->addFlash("text-danger", "Un utilisateur possède déjà cet email ou ce pseudo...");
                }
                else $this->addFlash("text-danger", "pas les mm mots de passe");
            }
            else $this->addFlash("text-danger", "passe pas les filtres");
        }
        
        return $this->render("security/register.php");
    }

}