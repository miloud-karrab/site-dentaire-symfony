<?php

namespace App\Controller;

use App\Repository\PostRepository;
use ContainerBwKqTRV\Paginator_f262b94;
use Knp\Component\Pager\PaginatorInterface;
use Knp\Component\Pager\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/post", name="post")
     */
    public function post(
        PostRepository $postRepository,
        PaginatorInterface $paginator,
        Request $request
    ): Response {
        $data = $postRepository->findAll();
        $posts = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            1
        );
        return $this->render('post/index.html.twig', [
            'posts' => $posts,
        ]);
    }
}
