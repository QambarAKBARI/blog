<?php

namespace App\Entity;

class Utilisateur extends AbstractEntity
{

    private $id_utilisateur;
    private $mail;
    private $nom;
    private $prenom;
    private $pass;
    private $role;







    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Get the value of mail
     */ 
    public function getMail()
    {
        return $this->mail;
    }




    /**
     * Get the value of id
     */ 
    public function getIdUtilisateur()
    {
        return $this->id_utilisateur;
    }



    /**
     * Get the value of pass
     */ 
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role ?? "ROLE_USER";
    }

    public function __toString()
    {
        return $this->nom . " " . $this->prenom;
    }


}