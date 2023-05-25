<?php

namespace App\Controller;

use App\Manager\AvisManager;
use App\Manager\BlogManager;

class BlogController extends AbstractController
{
    public function index()
    {
        $smanager = new BlogManager();
        $blogs = $smanager->findAll();

        return $this->render('blog/home.php', [
            'blogs' => $blogs,
        ]);
    }

    public function blog($id)
    {
        $smanager = new BlogManager();
        $avismanager = new AvisManager();
        $avis = $avismanager->findAllAvisByBlog($id);
        $post = $smanager->findOneById($id);

        return $this->render('blog/post.php', [
            'post' => $post,
            'avis' => $avis,
        ]);
    }
}
