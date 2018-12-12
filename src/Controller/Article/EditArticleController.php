<?php

namespace App\Controller\Article;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EditArticleController extends AbstractController
{
    /**
     * @Route("/article/edit/{id}", name="article_edit", requirements={"id": "\d+"})
     */
    public function edit(Article $article, Request $request)
    {
        $editArticleForm = $this->createForm(ArticleType::class, $article);

        $editArticleForm->handleRequest($request);

        if($editArticleForm->isSubmitted() && $editArticleForm->isValid()) {

            $entityManager = $this->getDoctrine()->getManagerForClass(Article::class);
            $entityManager->persist($article);

            $entityManager->flush();

            return $this->redirectToRoute('article_edit_success');
        }

        $editArticleView = $editArticleForm->createView();

        return $this->render('article/edit.html.twig', [
            'article' => $article,
            'edit_article_form' => $editArticleView
        ]);
    }

    /**
     * @Route("/article/edit/success", name="article_edit_success")
     */
    public function editSuccess()
    {
        return $this->render('article/edit_success.html.twig');
    }
}
