<?php

namespace App\Controller\API;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleControllerAPI extends AbstractController
{
    #[Route('/api/article', name: 'article.api.index', methods: ['GET'])]
    public function index(ArticleRepository $articleRepository)
    {
        $articles = $articleRepository->findAll();
        return $this->json($articles, 200, [], [
            'groups' => 'article.api.index',
        ]);
    }

    #[Route('/api/article/{id}', name:'article.api.detail', methods: ['GET'])]
    public function show(Article $article):Response
    {
        return $this->json($article, 200, [], [
            'groups' => ['article.api.index']
        ]);
    }
}