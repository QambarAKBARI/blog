<?php

namespace App\Entity;

use App\Manager\UtilisateurManager;

class Blog extends AbstractEntity
{
    private $id_blog;
    private $titre;
    private $photo;
    private $chapo;
    private $date_modif;
    private $contenu;
    protected $user_id;

    /**
     * Get the value of user_id.
     */
    public function getUtilisateur()
    {
        $user = new UtilisateurManager();

        return $user->findOneById($this->user_id)->getNom();
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Get the value of titre.
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Get the value of id.
     */
    public function getIdBlog()
    {
        return $this->id_blog;
    }

    public function getChapo()
    {
        return $this->chapo;
    }

    public function getDateModif()
    {
        return $this->date_modif;
    }
}
