<?php

namespace App\Controller;

use App\Service\Session;

abstract class AbstractController
{
    /**
     * Rend une vue et les données correspondantes.
     *
     * @param string     $view - le chemin de la vue (HTML) à rendre
     * @param array|null $data - le tableau des données que la vue affichera
     *
     * @return array un tableau structuré en deux clés : view et data (nécessité par index.php)
     */
    protected function render($view, $data = null)
    {
        return [
            'view' => VIEW_PATH.$view,
            'data' => $data,
        ];
    }

    /**
     * Redirige vers une URL.
     * 
     * @param mixed $url
     */
    protected function redirect($url): void
    {
        header('Location:'.$url);
    }

    /**
     * @param string $type
     * @param string $msg
     * 
     * @return void
     */
    protected function addFlash(string $type, string $msg): void
    {
        Session::set('Avis', ['type' => $type, 'msg' => $msg]);
    }

    /**
     * Undocumented function
     * 
     * @return [type]
     */
    protected function getUtilisateur()
    {
        return Session::get('utilisateur');
    }

    /**
     * 
     * @param mixed $role
     */
    protected function isGranted($role): bool
    {
        return Session::get('utilisateur') && Session::get('utilisateur')->getRole() === $role;
    }
}
