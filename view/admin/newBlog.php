<div class="container-md">
<form action="?ctrl=admin&action=newBlog" method="post">
  <fieldset>
    <legend>Ajouter un blog</legend>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Titre</label>
      <input type="text" class="form-control" id="exampleInputPassword1" name="titre" placeholder="Le titre de blog" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Chapô</label>
      <input type="text" class="form-control" id="exampleInputPassword1" name="chapo" placeholder="La phrase d'accroche" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Contenu</label>
      <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="contenu" placeholder="Le contenu" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Image(url)</label>
      <input type="text" class="form-control" id="" name="image" placeholder="url" required>
    </div>
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($token, ENT_QUOTES, 'UTF-8')?>">
    <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
  </fieldset>
</form>
</div>