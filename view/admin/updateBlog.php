<?php

use App\Service\Session;

$blog = $response["data"]["blog"];


$role = Session::get("utilisateur")->getRole();

$sessionUtilisateur = Session::get("utilisateur")->getNom();


?>
<div class="container-md">
<form action="?ctrl=admin&action=updateBlog&id=<?= $blog->getIdBlog() ?>" method="post">
  <fieldset>
    <legend>Modifier un blog</legend>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Titre</label>
      <input type="text" class="form-control" id="exampleInputPassword1" name="titre" value="<?= $blog->getTitre() ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Chapô</label>
      <input type="text" class="form-control" id="exampleInputPassword1" name="chapo" value="<?= $blog->getChapo() ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Contenu</label>
      <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="contenu" value="<?= $blog->getContenu() ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Image(url)</label>
      <input type="text" class="form-control" id="" name="image" value="<?= $blog->getPhoto() ?>">
    </div>
    <input type="hidden" name="csrf_token" value="<?= $token ?>">
    <button type="submit" class="btn btn-primary mt-3">Modifier</button>
  </fieldset>
</form>
</div>