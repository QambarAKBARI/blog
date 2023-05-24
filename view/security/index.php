<section id="hero">
   <div class="d-flex justify-content-center align-items-center h-100">
      <div class="text-white">
         <h1 class="mb-3">AKBARI Qambar</h1>
         <h5 class="mb-4">
            Développeur web PHP, pationné par le code et les nouvelles technologies.
         </h5>
         <a class="btn btn-outline-light btn-lg m-2" href="https://www.youtube.com/watch?v=c9B4TPnak1A" role="button" rel="nofollow" target="_blank">GitHub</a>
         <a class="btn btn-outline-light btn-lg m-2" href="https://mdbootstrap.com/docs/standard/" target="_blank" role="button">Download CV</a>
      </div>
   </div>
   <img src="<?= PHOTO_PATH ?>avatar.png" alt="">
</section>

<div class="container-lg mb-2">
   <section class="get-in-touch">
      <h3 class="title">Contactez-moi</h3>
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