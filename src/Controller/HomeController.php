<?php

namespace App\Controller;

use App\Entity\Employees;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/testing/{id}", name="app_test" )
     */

    public function test(Employees $employee): Response
    {
        return $this->render('employees/avtravaux.html.twig',['employee' => $employee,]);
    }
}
