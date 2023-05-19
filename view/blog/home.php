<?php

use App\Service\Session;

$blogs = $response["data"]["blogs"];

$role = Session::get("utilisateur")->getRole();

$sessionUtilisateur = Session::get("utilisateur")->getNom();


?>
<div class="container-lg">
<h1>Home page :</h1>
<h1>Nos Blogs :</h1>

<div class="row justify-content-evenly">
<?php
foreach($blogs as $suj){

    ?>
    <div class="card bg-light mb-3" style="max-width: 20rem;">
    <h2 class="card-header"><a class="h2" href="?ctrl=blog&action=blog&id=<?= $suj->getIdBlog() ?>"><?= $suj->getTitre()?></a></h2>
    <h3 class="card-header"><?= $suj->getChapo()?></h3>
    <div class="card-body">
    <h4 class="card-title">Créé par : <?= $suj->getUtilisateur() ?></h4>
    <p class="card-text"> Contenu : <?= $suj->getContenu()?></p>
    <p class="card-text"> Dernière modification : <?= $suj->getDateModif()?></p>
    
    <?php
    if($sessionUtilisateur == mb_strtolower($suj->getUtilisateur()) || $role == "ROLE_ADMIN" || $role == "SUPER_ADMIN"){
        ?>
        <a class="btn btn-primary mt-3" href="?ctrl=admin&action=updateBlog&id=<?= $suj->getIdBlog() ?>">Editer</a>
        <a class="btn btn-danger mt-3" href="?ctrl=admin&action=deleteBlog&id=<?= $suj->getIdBlog() ?>">Supprimer</a>
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



