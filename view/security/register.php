
<div class="container-md">
  <div class="col-4 offset-3">
<form action="?ctrl=security&action=register" method="post">
  <fieldset>
    <legend>Inscription</legend>
    <div class="form-group">
      <label for="" class="form-label mt-4">Nom</label>
      <input type="text" class="form-control" id="" name="nom" placeholder="Votre nom">
    </div>
    <div class="form-group">
      <label for="" class="form-label mt-4">Prénom</label>
      <input type="text" class="form-control" id="" name="prenom" placeholder="Votre prénom">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Adresse e-mail :</label>
      <input type="email" class="form-control" id="" aria-describedby="emailHelp" name="email" placeholder="Votre address mail">
    </div>
    <div class="form-group">
      <label for="" class="form-label mt-4">Password</label>
      <input type="password" class="form-control" id="" name="pass1" placeholder="Mot de pass">
    </div>
    <div class="form-group">
      <label for="" class="form-label mt-4">Password</label>
      <input type="password" class="form-control" id="" name="pass2" placeholder="Répétez votre mot de pass">
    </div>


    <input type="hidden" name="csrf_token" value="<?= $token ?>">
    <button type="submit" class="btn btn-primary mt-3">Inscription</button>
  </fieldset>
</form>
</div>
</div>