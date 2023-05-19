<?php

use App\Service\Session;

$post = $response["data"]["post"];
$avis = $response["data"]["avis"];

$role = Session::get("utilisateur")->getRole();

$sessionUtilisateur = Session::get("utilisateur")->getIdUtilisateur();


?>
<div class="container-lg">
<h1>Poste :</h1>


    <h2><?= $post->getTitre() ?></h2>
    <h3><?= $post->getChapo() ?></h3>
    <h4>Créé par : <?= $post->getUtilisateur() ?></h4>
    <p>Contenu : <?= $post->getContenu() ?></p>
    <p>image : <?= $post->getContenu() ? $post->getContenu() : "image non fourni"?></p>
    <p>Dernière Modification : <?= $post->getDateModif()?></p>




  <h4>Les avis(<?= count($avis) ?>) :</h4>  
<?php
foreach($avis as $suj){
    ?>
    <figure class="text-center">
        <blockquote class="blockquote">
            <p class="mb-0"><?= $suj->getCommentaire()?></p>
        
        </blockquote>
        <figcaption class="blockquote-footer">
            Auteur : <cite title="Source Title"><?= $suj->getUtilisateur()?></cite>
        </figcaption>
    </figure>
    <?php
    if($sessionUtilisateur == $suj->getUserId() || $role == "ROLE_ADMIN" || $role == "SUPER_ADMIN"){
        ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Supprimer
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  
                  <p>Êtes-vous sûr de vouloir supprimer ce commentaire ?</p>
                  <p><?= $suj->getCommentaire()?></p>
                  <p>Créé par : <?= $suj->getUtilisateur()?></p>
                  <p>id : <?= $suj->getIdAvis()?></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a class="btn btn-danger " href="?ctrl=admin&action=deleteAvis&id=<?= $suj->getIdAvis() ?>">Supprimer</a>
              </div>
            </div>
          </div>
        </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal">
          Editer
        </button>
        <!-- Modal -->
        <div class="modal fade modal-dialog-scrollable" id="myModal" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="myModal">Editer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  
              <form action="?ctrl=admin&action=updateAvis&id=<?= $suj->getIdAvis() ?>" method="post">
                <fieldset>
                  <input type="hidden" name="blog_id" value="<?= $post->getIdBlog() ?>">
                  <div class="form-group">
                    <label for="exampleTextarea" class="form-label mt-4">Editer votre commentaire</label>
                    <textarea class="form-control" id="exampleTextarea" name="commentaire" rows="3" ><?= $suj->getCommentaire()?></textarea>
                  </div>

                  <input type="hidden" name="csrf_token" value="<?= $token ?>">
                  <button type="submit" class="btn btn-primary mt-3">Editer</button>
                </fieldset>
              </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        
        
    <?php
    }
}
?>


<form action="?ctrl=admin&action=ajouterAvis&id=<?= $post->getIdBlog() ?>" method="post">
  <fieldset>

    <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Votre commentaire</label>
      <textarea class="form-control" id="exampleTextarea" name="commentaire" rows="3"></textarea>
    </div>

    <input type="hidden" name="csrf_token" value="<?= $token ?>">
    <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
  </fieldset>
</form>
</div>
