<?php

namespace App\Controller;

use App\Manager\AvisManager;

class AvisController extends AbstractController
{
    /**
     * @param mixed $id
     *
     * @return [type]
     */
    public function avis($id)
    {
        $mmanager = new AvisManager();
        $Avis = $mmanager->findAllAvisByBlog($id);

        return $this->render(
            'forum/Avis.php', [
            'Avis' => $Avis,
            'sujet_id' => $id,
            ]
        );
    }
}
