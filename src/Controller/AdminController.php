<?php


namespace App\Controller;

use App\Entity\Article;
use App\Entity\Commentaire;
use App\Form\ArticleType;
use App\Form\CommentaireType;
use App\Repository\ArticleRepository;
use App\Repository\CommentaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends abstractController
{


    /**
     * @Route ("/bio", name="bio")
     */
    public function bio()
    {
        return $this->render('Bio.html.twig');
    }

    /**
     * @Route ("/blog", name="blog")
     */
    public function blog(ArticleRepository $articleRepository)
    {
        $articles = $articleRepository->findAll();
        return $this->render('Blog.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * @Route ("/restaurant", name="restaurant")
     */
    public function restaurant(CommentaireRepository $commentaireRepository)
    {
        $commentaires = $commentaireRepository->findAll();
        return $this->render('Restaurant.html.twig', [
            'commentaires' => $commentaires
        ]);
    }

    /**
     * @Route ("/contact", name="contact")
     * Nouveau commentaire
     */
    public function contact(Request $request, EntityManagerInterface $entityManager)
    {
        $commentaire = new Commentaire();
        $commentaire->setDate(new \DATETIME('now'));

        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager -> persist($commentaire);
            $entityManager ->flush();
        }

        return $this->render('Contact.html.twig', ['CommentaireForm' => $form->createView()]);
    }

    /**
     * @Route("/NewArticle", name="newArticle")
     * Nouvel Article
     */
    public function newArticle(Request $request, EntityManagerInterface $entityManager)
    {
        $article = new Article();
        $article->setDate(new \DATETIME('now'));

        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager -> persist($article);
            $entityManager ->flush();
        }
        return $this->render('NewArticle.html.twig', ['ArticleForm' => $form->createView()]);
    }

}