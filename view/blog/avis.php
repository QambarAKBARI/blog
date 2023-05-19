<?php

use App\Service\Session;

$Avis = $response["data"]["Avis"];
$topic_id = $response["data"]["sujet_id"];

$role = Session::get("user")->getRole();
$sessionUser = Session::get("user")->getPseudo();

$lock = null;

$formAction = "?ctrl=Avis&action=addAvis&id=$topic_id";


?>
<h1>les Aviss :</h1>
<div class="sujet-item">
<?php
foreach($Avis as $Avis){
    ?>
    <h3>Auteur : <?=$Avis->getUser() ?></h3>
    <p>Date de creation : <?= $Avis->getDateCreation() ?></p>
    <p><?= $Avis->getText() ?></p>
    <?php
    if($sessionUser == mb_strtolower($Avis->getUser()) || $role == "ROLE_ADMIN" || $role == "SUPER_ADMIN"){
        ?>
        <a href="?ctrl=sujet&action=editeAvis&id=<?= $Avis->getId() ?>">Editer</a>
        <a href="?ctrl=Avis&action=deleteAvis&id=<?= $Avis->getId() ?>">Supprimer</a>
    <?php
    }

    /*if($Avis->getSujet()->getVerouillage() == "yes"){
        $lock = "fermee";
    }else{
        $lock = "ouvert";
    }*/
}
?>
</div>
<form class="<?= $lock ?>" action="<?= $formAction ?>" method="post">
    <label for="Avis">Votre Avis : </label>
    <textarea name="Avis" id="default" cols="30" rows="10" required>
    </textarea>
    <input type="hidden" name="csrf_token" value="<?= $token ?>">
    <input type="submit" value="Envoyer">
</form>

