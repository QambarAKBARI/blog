<?php

use App\Service\Session;

$users = $response["data"]["users"];


$role = Session::get("utilisateur")->getRole();

$sessionUtilisateur = Session::get("utilisateur")->getNom();


?>
<div class="container-lg">
<div class="row justify-content-center mt-4">
        <h1 class="text-center">Nos utilisateurs :</h1>
    </div>
<div class="row justify-content-evenly">
<?php
foreach($users as $suj){

    ?>
    <div class="card bg-light mb-3" style="max-width: 20rem;">
    <h4 class="card-header"><a class="" href="?ctrl=blog&action=blog&id=<?= $suj->getIdUtilisateur() ?>"><?= $suj->getNom()?></a></h4>
    <h5 class="card-header"><?= $suj->getPrenom()?></h5>
        <div class="card-body">
        <h6 class="card-title">Role : <?= $suj->getRole() ?></h6>
        <h6 class="card-text"> Email : <?= $suj->getMail()?></h6>
        
        </div> 
    </div>
    <?php
}
?>
</div>
</div>



