<?php

namespace App\Controller\Article;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AddArticleController extends AbstractController
{
    /**
     * @Route("/article/add", name="article_add")
     */
    public function add(Request $request)
    {
        $article = new Article();
        $addArticleForm = $this->createForm(ArticleType::class, $article);

        $addArticleForm->handleRequest($request);

        if($addArticleForm->isSubmitted() && $addArticleForm->isValid()) {

            $entityManager = $this->getDoctrine()->getManagerForClass(Article::class);
            $entityManager->persist($article);

            $entityManager->flush();

            return $this->redirectToRoute('article_add_success');
        }

        $addArticleView = $addArticleForm->createView();

        return $this->render('article/add.html.twig', [
            'add_article_form' => $addArticleView
        ]);
    }

    /**
     * @Route("/article/add-success", name="article_add_success")
     */
    public function addSuccess()
    {
        return $this->render('article/add_success.html.twig');
    }


}
