<?php

namespace App\Manager;

class UtilisateurManager extends AbstractManager
{
    public function __construct()
    {
        parent::connect();
    }

    public function findAll()
    {
        return $this::getResults(
            'App\\Entity\\Utilisateur',
            'SELECT * FROM utilisateur'
        );
    }

    public function findOneById($id)
    {
        return $this::getOneOrNullResult(
            'App\\Entity\\Utilisateur',
            'SELECT * FROM utilisateur WHERE id_utilisateur = :id',
            [
                ':id' => $id,
            ]
        );
    }

    public function findByUsernameOrEmail($nom, $email)
    {
        return $this::getOneOrNullResult(
            'App\\Entity\\Utilisateur',
            'SELECT * FROM utilisateur WHERE mail = :email OR nom = :nom',
            [
                ':nom' => $nom,
                ':email' => $email,
            ]
        );
    }

    public function insertUser($nom, $prenom, $email, $hash)
    {
        return $this::executeQuery(
            'INSERT INTO utilisateur (nom, prenom, mail, pass) VALUES (:n, :p, :e, :h)',
            [
                ':n' => $nom,
                ':p' => $prenom,
                ':e' => $email,
                ':h' => $hash,
            ]
        );
    }

    public function addAdmin($id)
    {
        return $this::executeQuery(
            'UPDATE utilisateur 
            SET role = :y
            WHERE id_utilisateur = :id',
            [
                ':id' => $id,
                ':y' => 'ROLE_ADMIN',
            ]
        );
    }
}
