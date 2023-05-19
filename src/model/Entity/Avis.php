<?php

namespace App\Entity;

use App\Manager\UtilisateurManager;

class Avis extends AbstractEntity{

    private $id_avis;
    private $commentaire;
    private $date_creation;
    protected $user_id;
    protected $blog_id;


    public function getBlogId()
    {
        return $this->blog_id;
    }


    public function getUtilisateur()
    {
        $user = new UtilisateurManager();
        return $user->findOneById($this->user_id)->getNom();
    }
    public function getUserId()
    {
        return $this->user_id;
    }

    public function getDateCreation()
    {
        return $this->date_creation;
    }



    public function getIdAvis()
    {
        return $this->id_avis;
    }


    public function getCommentaire()
    {
        return $this->commentaire;
    }
}