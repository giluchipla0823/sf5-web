<?php

namespace App\Controller;

use App\Entity\Author;
use App\Form\AuthorType;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/authors")
 */
class AuthorController extends AbstractController
{
    private $repository;

    public function __construct(Registry $registry)
    {
        $this->repository = $registry->getRepository(Author::class);
    }

    /**
     * List of Authors
     *
     * @Route("/", name="author_index", methods={"GET"})
     * @return Response
     */
    public function index(): Response
    {
        $authors = $this->repository->findAll();

        return $this->render('authors/index.html.twig', [
            'authors' => $authors,
        ]);
    }

    /**
     * Create Author
     *
     * @Route("/new", name="author_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function new(Request $request): Response
    {
        $author = new Author();
        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->repository->create($author);

            return $this->redirectToRoute('author_index');
        }

        return $this->render('authors/new.html.twig', [
            'author' => $author,
            'form' => $form->createView()
        ]);
    }

    /**
     * Show Author
     *
     * @Route("/{id}", name="author_show", methods={"GET"})
     * @param Author $author
     * @return Response
     */
    public function show(Author $author): Response
    {
        return $this->render('authors/show.html.twig', [
            'author' => $author,
        ]);
    }

    /**
     * Edit Author
     *
     * @Route("/{id}/edit", name="author_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Author $author
     * @return Response
     */
    public function edit(Request $request, Author $author): Response
    {
        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->repository->update();

            return $this->redirectToRoute('author_index');
        }

        return $this->render('authors/edit.html.twig', [
            'author' => $author,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Remove Author
     *
     * @Route("/{id}", name="author_delete", methods={"DELETE"})
     * @param Request $request
     * @param Author $author
     * @return Response
     */
    public function delete(Request $request, Author $author): Response
    {
        if ($this->isCsrfTokenValid('delete' . $author->getId(), $request->request->get('_token'))) {
            $this->repository->remove($author);
        }

        return $this->redirectToRoute('author_index');
    }
}
