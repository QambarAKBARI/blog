<?php

namespace App\Controller;

use App\Manager\AvisManager;
use App\Manager\BlogManager;
use App\Manager\UtilisateurManager;
use App\Service\Form;
use App\Service\Session;

class AdminController extends AbstractController
{
    /**
     * @return [type]
     */
    public function index()
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            return false;
        }

        return $this->render('admin/home.php');
    }

    /**
     * @return [type]
     */
    public function commentaires()
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            return false;
        }
        $avis = new AvisManager();
        $avis = $avis->findAll();

        return $this->render(
            'admin/commentaires.php', [
            'avis' => $avis,
            ]
        );
    }

    /**
     * @return [type]
     */
    public function users()
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            return false;
        }
        $users = new UtilisateurManager();
        $users = $users->findAll();

        return $this->render(
            'admin/users.php', [
            'users' => $users,
            ]
        );

        return $this->render('admin/home.php');
    }

    /**
     * @return [type]
     */
    public function newBlog()
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            return false;
        }
        if (Form::isSubmitted()) {
            $titre = Form::getData('titre', 'text');
            $chapo = Form::getData('chapo', 'text');
            $contenu = Form::getData('contenu', 'text');
            $photo = Form::getData('image', 'text');
            $user = Session::get('utilisateur')->getIdUtilisateur();
            $date = new \DateTime();
            $newDate = $date->format('Y-m-d H:i:s');
            if ($titre && $chapo && $contenu && $photo && $user && $newDate) {
                $manager = new BlogManager();
                if ($manager->insertBlog($titre, $contenu, $photo, $user, $chapo, $newDate)) {
                    $this->addFlash('text-success', 'Le blog est entré en base de données !!');

                    return $this->redirect('?ctrl=blog&action=index');
                } else {
                    $this->addFlash('text-danger', 'Erreur de BDD !!');
                }
            } else {
                $this->addFlash('text-danger', 'Veuillez vérifier les données du formulaire');
            }

            return $this->redirect('?ctrl=admin');
        }

        return $this->render('admin/newBlog.php');
    }

    /**
     * @param mixed $id
     *
     * @return [type]
     */
    public function updateBlog($id)
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            return false;
        }

        $manager = new BlogManager();

        if (Form::isSubmitted()) {
            $titre = Form::getData('titre', 'text');
            $chapo = Form::getData('chapo', 'text');
            $contenu = Form::getData('contenu', 'text');
            $photo = Form::getData('image', 'text');
            $user = Session::get('utilisateur')->getIdUtilisateur();
            $date = new \DateTime();
            $newDate = $date->format('Y-m-d H:i:s');
            if ($titre && $chapo && $contenu && $photo && $user && $newDate) {
                if ($manager->updateBlog($id, $titre, $chapo, $contenu, $photo, $newDate, $user)) {
                    $this->addFlash('text-success', 'Le blog a été modifié avec succès !!');

                    return $this->redirect('?ctrl=blog&action=index');
                } else {
                    $this->addFlash('text-danger', 'Erreur de BDD !!');
                }
            } else {
                $this->addFlash('text-danger', 'Veuillez vérifier les données du formulaire');
            }
        }

        $blog = $manager->findOneById($id);

        return $this->render(
            'admin/updateBlog.php', [
            'blog' => $blog,
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
        if (!$this->isGranted('ROLE_ADMIN')) {
            return false;
        }

        $manager = new BlogManager();

        if ($manager->deleteBlog($id)) {
            $this->addFlash('text-success', 'Le blog a été supprimé avec succès !!');

            return $this->redirect('?ctrl=blog&action=index');
        } else {
            $this->addFlash('text-danger', 'Erreur de BDD !!');
        }
    }

    /**
     * @param mixed $blog_id
     *
     * @return [type]
     */
    public function ajouterAvis($blog_id)
    {
        $manger = new AvisManager();
        if (Form::isSubmitted()) {
            $text = Form::getData('commentaire', 'text');
            $user = Session::get('utilisateur')->getIdUtilisateur();
            if ($text && $user && $blog_id) {
                if ($manger->insertAvis($text, $user, $blog_id)) {
                    $this->addFlash('text-success', "L'avis a été ajouté avec succès !!");

                    return $this->redirect("?ctrl=blog&action=blog&id=$blog_id");
                } else {
                    $this->addFlash('text-danger', 'Erreur de BDD !!');
                }
            } else {
                $this->addFlash('text-danger', 'Veuillez vérifier les données du formulaire');

                return $this->redirect("?ctrl=blog&action=blog&id=$blog_id");
            }
        }
    }

    /**
     * @param mixed $id
     *
     * @return [type]
     */
    public function updateAvis($id)
    {
        $manager = new AvisManager();

        if (Form::isSubmitted()) {
            $text = Form::getData('commentaire', 'text');
            $user = Session::get('utilisateur')->getIdUtilisateur();
            $blog_id = Form::getData('blog_id', 'text');
            if ($text && $user && $blog_id) {
                if ($manager->updateAvis($id, $text, $user, $blog_id)) {
                    $this->addFlash('text-success', "L'avis a été modifié avec succès !!");

                    return $this->redirect("?ctrl=blog&action=blog&id=$blog_id");
                } else {
                    $this->addFlash('text-danger', 'Erreur de BDD !!');

                    return $this->redirect('?ctrl=blogs');
                }
            } else {
                $this->addFlash('text-danger', 'Veuillez vérifier les données du formulaire');
            }
        }

        return $this->redirect('?ctrl=admin');
    }

    /**
     * @param mixed $id
     *
     * @return [type]
     */
    public function validateAvis($id)
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            return false;
        }

        $manager = new AvisManager();

        if ($manager->approuverAvis($id)) {
            $this->addFlash('text-success', "L'avis a été validé avec succès !!");

            return $this->redirect('?ctrl=admin&action=commentaires');
        } else {
            $this->addFlash('text-danger', 'Erreur de BDD !!');
        }
    }

    /**
     * @param mixed $id
     *
     * @return [type]
     */
    public function deleteAvis($id)
    {
        $mmanager = new AvisManager();
        if ($mmanager->deleteAvis($id)) {
            $this->addFlash('text-success', 'votre Avis a bien été supprimé !!');
            $this->redirect('?ctrl=blog&action=index');
        } else {
            $this->addFlash('text-danger', 'Problème de connexion de BDD !!!');
        }
    }
}
