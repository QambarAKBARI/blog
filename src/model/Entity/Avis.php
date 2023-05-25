<?php

namespace App\Entity;

use App\Manager\BlogManager;
use App\Manager\UtilisateurManager;

class Avis extends AbstractEntity
{
    private $id_avis;
    private $commentaire;
    private $date_creation;
    private $status;
    protected $user_id;
    protected $blog_id;

    /**
     * @return [type]
     */
    public function getBlogId()
    {
        return $this->blog_id;
    }

    /**
     * @return [type]
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return [type]
     */
    public function getCorespondBlog()
    {
        $blog = new BlogManager();

        return $blog->findOneById($this->blog_id)->getTitre();
    }

    /**
     * @return [type]
     */
    public function getUtilisateur()
    {
        $user = new UtilisateurManager();

        return $user->findOneById($this->user_id)->getNom();
    }

    /**
     * @return [type]
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return [type]
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * @return [type]
     */
    public function getIdAvis()
    {
        return $this->id_avis;
    }

    /**
     * @return [type]
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }
}
