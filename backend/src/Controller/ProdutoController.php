<?php

namespace App\Controller;

use App\Entity\Produto;
use App\Form\ProdutoType;
use App\Repository\ProdutoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/produto")
 */
class ProdutoController extends AbstractController
{
    /** 
     * @Route("/", name="produto_index", methods={"GET"})
     */
    public function index(ProdutoRepository $produtoRepository): Response
    {       
        return $this->render('produto/index.html.twig', [
            'produtos' => $produtoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="produto_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $produto = new Produto();
        $form = $this->createForm(ProdutoType::class, $produto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($produto);
            $entityManager->flush();

            return $this->redirectToRoute('produto_index');
        }

        return $this->render('produto/new.html.twig', [
            'produto' => $produto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="produto_show", methods={"GET"})
     */
    public function show(Produto $produto): Response
    {
        return $this->render('produto/show.html.twig', [
            'produto' => $produto,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="produto_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Produto $produto): Response
    {
        $form = $this->createForm(ProdutoType::class, $produto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('produto_index');
        }

        return $this->render('produto/edit.html.twig', [
            'produto' => $produto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="produto_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Produto $produto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produto->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($produto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('produto_index');
    }
}
