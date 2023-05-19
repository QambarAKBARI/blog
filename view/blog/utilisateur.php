<?php
use App\Service\Session;

$users = $response["data"]["users"];

$role = Session::get("user")->getRole();
?>
<h1>Nos users :</h1>
<div class="sujet-item">
<?php
foreach($users as $user){

    if($user->getRole() == "ROLE_USER"){
        ?>

        <h2>Pseudo : <?= ucfirst($user) ?></h2>
        <h3>Role : <?= $user->getRole() ?></h3>
        <h4>Depuis : <?= $user->getDate_inscription() ?></h4>
        <?php
    }
    if($user->getRole() == "ROLE_ADMIN"){

        ?>
        <h2>Pseudo : <?= ucfirst($user) ?></h2>
        <h3>Role : <?= $user->getRole() ?></h3>
        <h4>Depuis : <?= $user->getDate_inscription() ?></h4>
        <a href="?ctrl=admin&action=banUser&id=<?= $user->getId() ?>">Bannir</a><br>
        <a href="?ctrl=admin&action=addAdmin&id=<?= $user->getId() ?>">Faire Admin</a>
    
        <?php
        }

}
?>
</div>