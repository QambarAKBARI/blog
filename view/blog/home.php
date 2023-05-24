<?php

use App\Service\Session;

$blogs = $response["data"]["blogs"];

$role = Session::get("utilisateur")->getRole();

$sessionUtilisateur = Session::get("utilisateur")->getNom();


?>
<div class="container-lg">
    <div class="row justify-content-center mt-4">
        <h1 class="text-center">Blog</h1>
    </div>
    <div class="row justify-content-evenly">
        <?php
        foreach ($blogs as $suj) {
       
        ?>
            <div class="card mb-3" style="max-width: 25rem;">
                <h4 class="card-header p-3">
                    <a class="" href="?ctrl=blog&action=blog&id=<?= $suj->getIdBlog() ?>"><?= $suj->getTitre() ?></a>
                </h4>
                <h5 class="card-header p-2"><?= $suj->getChapo() ?></h5>
                <div class="card-body">
                    <h6 class="card-text"> Dernière modification : <?= $suj->getDateModif() ?></h6>
                    <a class="btn btn-info " href="?ctrl=blog&action=blog&id=<?= $suj->getIdBlog() ?>">Voir plus</a>
                    <?php
                    if ($sessionUtilisateur == mb_strtolower($suj->getUtilisateur()) || $role == "ROLE_ADMIN" || $role == "SUPER_ADMIN") {
                    ?>
                        <hr>
                        <a class="btn btn-danger " href="?ctrl=admin&action=deleteBlog&id=<?= $suj->getIdBlog() ?>">Supprimer</a>
                        <a class="btn btn-primary " href="?ctrl=admin&action=updateBlog&id=<?= $suj->getIdBlog() ?>">Editer</a>


                    <?php
                    }
                    ?>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>