<?php

namespace App\Entity;

use App\Manager\BlogManager;
use App\Manager\UtilisateurManager;

class Avis extends AbstractEntity{

    private $id_avis;
    private $commentaire;
    private $date_creation;
    private $status;
    protected $user_id;
    protected $blog_id;


    public function getBlogId()
    {
        return $this->blog_id;
    }
    public function getStatus()
    {
        return $this->status;
    }

    public function getCorespondBlog()
    {
        $blog = new BlogManager();
        return $blog->findOneById($this->blog_id)->getTitre();
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