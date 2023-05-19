<?php
use App\Service\Session;

$hello =  "Bienvenue ".Session::get('utilisateur')->getNom()." : dans votre site !!<br>";
?>
<div class="container-lg">
    <p class="text-info"><?= $hello ?></p>
<h1>Administration :</h1>
<a class="btn btn-success" href="?ctrl=admin&action=newBlog">Ajouter un blog</a>
<a class="btn btn-info" href="?ctrl=admin&action=users">Voir les utilisateurs</a>
</div>
