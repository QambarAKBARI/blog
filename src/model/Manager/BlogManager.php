<?php

namespace App\Manager;

class BlogManager extends AbstractManager
{
    public function __construct()
    {
        parent::connect();
    }

    /**
     * @return [type]
     */
    public function findAll()
    {
        return $this::getResults(
            'App\\Entity\\Blog',
            'SELECT * FROM blog ORDER BY date_modif DESC'
        );
    }

    /**
     * @param mixed $id
     *
     * @return [type]
     */
    public function findOneById($id)
    {
        return $this::getOneOrNullResult(
            'App\\Entity\\Blog',
            'SELECT * FROM blog 
            WHERE id_blog = :id',
            [
                ':id' => $id,
            ]
        );
    }

    /**
     * @param mixed $titre
     * @param mixed $contenu
     * @param mixed $photo
     * @param mixed $user_id
     * @param mixed $chapo
     * @param mixed $date
     *
     * @return [type]
     */
    public function insertBlog($titre, $contenu, $photo, $user_id, $chapo, $date)
    {
        return $this::executeQuery(
            'INSERT INTO blog (titre, contenu, photo, user_id, chapo, date_modif) VALUES (:t, :c, :p, :u, :chapo, :date_modif)',
            [
                ':t' => $titre,
                ':c' => $contenu,
                ':p' => $photo,
                ':u' => $user_id,
                ':chapo' => $chapo,
                ':date_modif' => $date,
            ]
        );
    }

    /**
     * @param mixed $id
     *
     * @return [type]
     */
    public function deleteBlog($id)
    {
        return $this::executeQuery(
            'DELETE FROM blog WHERE id_blog = :id',
            [
                ':id' => $id,
            ]
        );
    }

    /**
     * @param mixed $id
     * @param mixed $titre
     * @param mixed $chapo
     * @param mixed $contenu
     * @param mixed $photo
     * @param mixed $date
     * @param mixed $user_id
     *
     * @return [type]
     */
    public function updateBlog($id, $titre, $chapo, $contenu, $photo, $date, $user_id)
    {
        return $this::executeQuery(
            'UPDATE blog SET titre = :t, chapo = :ch,contenu = :c, photo = :p, date_modif = :d, user_id = :u WHERE id_blog = :id',
            [
                ':id' => $id,
                ':t' => $titre,
                ':ch' => $chapo,
                ':c' => $contenu,
                ':p' => $photo,
                ':d' => $date,
                ':u' => $user_id,
            ]
        );
    }

    /**
     * @param mixed $id
     *
     * @return [type]
     */
    public function findAllBlogsByUser($id)
    {
        return $this::getResults(
            'App\\Entity\\Blog',
            'SELECT id, titre, contenu, photo, user_id FROM blog
            Where user_id = :id',
            [
                ':id' => $id,
            ]
        );
    }
}
