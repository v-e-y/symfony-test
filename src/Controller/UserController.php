<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * Create new User
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \App\Repository\UserRepository $userRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function new(Request $request, UserRepository $userRepository): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->save($user, true);

            return $this->redirectToRoute('app_controller_home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    /**
     * Show list of Users and his Products
     * @param \App\Repository\UserRepository $userRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getUsersProducts(UserRepository $userRepository): Response
    {
        return $this->render('user/users_products.html.twig', [
            'users' => $userRepository->findAll()
        ]);
    }
    
    public function addProducts(
        Request $request,
        UserRepository $userRepository, 
        ProductRepository $productRepository
    ): Response
    {
        //dump($userRepository->findAll(), $productRepository->findAll()); die;
        

        return $this->render('user/users_products_add.html.twig', [
            'users' => $userRepository->findAll(),
            'products' => $productRepository->findAll()
        ]);
    }
}
