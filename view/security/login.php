<div class="container-md">
<div class="col-4 offset-3">
<form action="?ctrl=security&action=login" method="post">
  <fieldset>
    <legend>Connexion</legend>

    <div class="form-group">
      <label for="" class="form-label mt-4">Nom d'utilisateur ou adresse e-mail :</label>
      <input type="text" class="form-control" id="" name="credentials" placeholder="Votre address mail">
    </div>
    <div class="form-group">
      <label for="" class="form-label mt-4">Password</label>
      <input type="password" class="form-control" id="" name="password" placeholder="Mot de pass">
    </div>


    <input type="hidden" name="csrf_token" value="<?= $token ?>">
    <button type="submit" class="btn btn-primary mt-3">Connexion</button>
  </fieldset>
</form>
</div>
</div>