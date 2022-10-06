<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AppController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('homepage.html.twig', [
            'title' => 'Welcome to the user-products app',
            'body' => 'Test index method'
        ]);
    }
}