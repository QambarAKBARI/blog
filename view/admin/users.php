<?php

use App\Service\Session;

$users = $response["data"]["users"];


$role = Session::get("utilisateur")->getRole();

$sessionUtilisateur = Session::get("utilisateur")->getNom();


?>
<div class="container-lg">
<h1>Nos Utilisateurs :</h1>

<div class="row justify-content-evenly">
<?php
foreach($users as $suj){

    ?>
    <div class="card bg-light mb-3" style="max-width: 20rem;">
    <h2 class="card-header"><a class="h2" href="?ctrl=blog&action=blog&id=<?= $suj->getIdUtilisateur() ?>"><?= $suj->getNom()?></a></h2>
    <h3 class="card-header"><?= $suj->getPrenom()?></h3>
        <div class="card-body">
        <h4 class="card-title">Role : <?= $suj->getRole() ?></h4>
        <p class="card-text"> Email : <?= $suj->getMail()?></p>
        
        </div> 
    </div>
    <?php
}
?>
</div>
</div>



