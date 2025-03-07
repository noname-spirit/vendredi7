<?php

namespace App\Controller;

use App\Repository\EmployeRepository;
use App\Repository\ServiceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class FrontController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EmployeRepository $employeRepo, ServiceRepository $serviceRepo): Response
    {
        $nbEmployes = $employeRepo->count([]);
        $nbServices = $serviceRepo->count([]);

        return $this->render('base.html.twig', [
            'nbEmployes' => $nbEmployes,
            'nbServices' => $nbServices,
        ]);
    }
}
