<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     * prend en paramètre l'adresse et le name
     */
    public function index(ArticleRepository $articlesRepo)
    {
        $articles= $articlesRepo->findAll();
        return $this->render('blog/index.html.twig', [
            
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/blog/show/{id}", name="blogshow")
     */
    public function show(Article $article)
    {
        return $this->render('blog/show.html.twig', [
            
            'article' => $article
        ]);
    }
    /**
     * @Route("/blog/article/edit", name="edit")
     */

    public function edit()
    {
        $title = "Modifier article";

        return $this->render('blog/article/edit.html.twig', [
            
            'title' => $title
        ]);
    }
}
