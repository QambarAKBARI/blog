


<div class="hero">
	<h1 class="titre-hero">Bienvenue sur votre blog !!<span>- Veuillez vous inscrire pour pouvoir consulter notre site blog-</span></h1>
</div>

<div class="container-lg mb-2">
<section class="get-in-touch">
   <h1 class="title">Posez moi votre question</h1>
   <form class="contact-form row" action="?ctrl=form&action=formContact" method="post">
      <div class="form-field col-lg-6">
         <input id="name" class="input-text js-input" type="text" name="nom" required>
         <label class="label" for="name">Nom</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="email" class="input-text js-input" type="email" name="email" required>
         <label class="label" for="email">E-mail</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="company" class="input-text js-input" type="text" name="entreprise" required>
         <label class="label" for="company">Entreprise</label>
      </div>
       <div class="form-field col-lg-6 ">
         <input id="phone" class="input-text js-input" type="text" name="telephone" required>
         <label class="label" for="phone">Téléphone</label>
      </div>
      <div class="form-field col-lg-12">
         <input id="message" class="input-text js-input" type="text" name="message" required>
         <label class="label" for="message">Message</label>
      </div>
      <input type="hidden" name="csrf_token" value="<?= $token ?>">
      <div class="form-field col-lg-12">
         <input class="submit-btn" type="submit" value="Submit">
      </div>
   </form>
</section>
</div>