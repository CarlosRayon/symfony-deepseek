<?php

namespace App\Controller;

use App\Service\DeepSeekService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DeepSearchController extends AbstractController
{
    private $deepSeekService;

    public function __construct(DeepSeekService $deepSeekService)
    {
        $this->deepSeekService = $deepSeekService;
    }

    #[Route('/deepseek', name: 'deepseek')]
    public function index(): Response
    {
        $data = $this->deepSeekService->getDataFromDeepSeek();

        return $this->json($data);
    }
}
