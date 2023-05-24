<?php

use App\Service\Session;

$avis = $response["data"]["avis"];


$role = Session::get("utilisateur")->getRole();

$sessionUtilisateur = Session::get("utilisateur")->getNom();


?>
<div class="container-lg">
<div class="row justify-content-center mt-4">
        <h1 class="text-center">Les commentaires des utilisateurs</h1>
    </div>
<div class="row justify-content-evenly">
<?php
foreach($avis as $suj){

    ?>
    <div class="card bg-light mb-3" style="max-width: 20rem;">
    <h4 class="card-header"><a class="" href="?ctrl=blog&action=blog&id=<?= $suj->getIdAvis() ?>"><?= $suj->getCommentaire()?></a></h4>
    
    <h5 class="<?= $suj->getStatus() == "En attente" ? "text-danger" : "text-success"?>"><?= $suj->getStatus()?></h5>
        <div class="card-body">
        <h5 class="card-title">Rédigé par : <?= $suj->getUtilisateur() ?></h5>
        <h6 class="card-title">Date : <?= $suj->getDateCreation() ?></h6>
        <h6 class="card-text"> Blog : <?= $suj->getCorespondBlog()?></h6>
        <?php
    if($suj->getStatus() == "En attente"){
        ?>
        <a class="btn btn-success" href="?ctrl=admin&action=validateAvis&id=<?= $suj->getIdAvis() ?>">Valider</a>
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



