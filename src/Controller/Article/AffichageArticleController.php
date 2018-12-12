<?php

namespace App\Controller\Article;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class AffichageArticleController extends AbstractController
{
    /**
     * @Route("/articles", name="article_list_article")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManagerForClass(Article::class);
        $articleRespository = $entityManager->getRepository(Article::class);

        $articles = $articleRespository->findAll();

        return $this->render('article/list_article/index.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/article/{id}", name="article_detail_article")
     */
    public function detail(Article $article)
    {
        return $this->render('article/list_article/detail.html.twig', [
            'article' => $article
        ]);
    }
}
