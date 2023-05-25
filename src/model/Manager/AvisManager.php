<?php

namespace App\Manager;

class AvisManager extends AbstractManager
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
            'App\\Entity\\Avis',
            'SELECT * FROM Avis'
        );
    }

    /**
     * @param mixed $id
     *
     * @return [type]
     */
    public function findAllAvisByBlog($id)
    {
        return $this::getResults(
            'App\\Entity\\Avis',
            'SELECT id_avis, commentaire, date_creation, blog_id, user_id, status FROM Avis
            Where blog_id = :id',
            [
                ':id' => $id,
            ]
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
            'SELECT titre, s.id AS id FROM blog 
            WHERE id = :id',
            [
                ':id' => $id,
            ]
        );
    }

    /**
     * @param mixed $text
     * @param mixed $user_id
     * @param mixed $sujet_id
     *
     * @return [type]
     */
    public function insertAvis($text, $user_id, $sujet_id)
    {
        return $this->executeQuery(
            'INSERT INTO Avis (commentaire, user_id, blog_id) VALUES (:t, :u, :s)',
            [
                ':t' => $text,
                ':u' => $user_id,
                ':s' => $sujet_id,
            ]
        );
    }

    /**
     * @param mixed $id
     * @param mixed $text
     * @param mixed $user_id
     * @param mixed $sujet_id
     *
     * @return [type]
     */
    public function updateAvis($id, $text, $user_id, $sujet_id)
    {
        return $this::executeQuery(
            'UPDATE Avis 
            SET commentaire = :t, user_id = :u, blog_id = :s
            WHERE id_avis = :id',
            [
                ':id' => $id,
                ':t' => $text,
                ':u' => $user_id,
                ':s' => $sujet_id,
            ]
        );
    }

    /**
     * @param mixed $id
     *
     * @return [type]
     */
    public function deleteAvis($id)
    {
        return $this::executeQuery(
            'DELETE FROM Avis WHERE id_avis = :id',
            [
                ':id' => $id,
            ]
        );
    }

    /**
     * @param mixed $id
     *
     * @return [type]
     */
    public function approuverAvis($id)
    {
        return $this::executeQuery(
            'UPDATE Avis 
            SET status = :y
            WHERE id_avis = :id',
            [
                ':id' => $id,
                ':y' => 'Approuvé',
            ]
        );
    }
}
