<?php

namespace App\Controller;

use App\Service\DeepSeekService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DeepSearchController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(Request $request, DeepSeekService $deepSeekService): Response
    {
        $userRequest = '';
        $responseContent = 'Pregunta algo!';

        if ($request->isMethod('POST')) {
            $userRequest = $request->request->get('user_request');

            if (!empty($userRequest)) {
                $responseContent = $deepSeekService->getDataFromDeepSeek($userRequest)->getResponseContent();
            }
        }

        return $this->render('home/home.html.twig', [
            'user_request' => $userRequest,
            'response_content' => $responseContent,
        ]);
    }
}
