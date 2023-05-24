<?php

namespace App\Controller;

use App\Manager\AvisManager;
use App\Manager\BlogManager;
use App\Service\Session;
use App\Service\Form;

class AvisController extends AbstractController {


        
        public function avis($id){
            $mmanager = new AvisManager;
            $Avis = $mmanager->findAllAvisByBlog($id);

            return $this->render("forum/Avis.php", [
                "Avis" => $Avis,
                "sujet_id" => $id
            ]);
        }



    }