<?php

namespace App\Controller;

use App\Geometry\ExposeGeometry;
use App\Geometry\Circle;
use App\Services\GeometryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CircleController extends AbstractController
{
    private $exposeGeometry;
    private $geometryService;

    public function __construct(ExposeGeometry $exposeGeometry, GeometryService $geometryService)
    {
        $this->exposeGeometry = $exposeGeometry;
        $this->geometryService = $geometryService;
    }

    #[Route('/circle/{radius}', name: 'app_circle')]
    public function index(float $radius): JsonResponse
    {
        $circle = new Circle($radius);

        $exportData = $this->exposeGeometry->expose($circle);

        $exportData['sum_diameter'] = $this->geometryService->calcSumDiameter($circle, $circle);

        return new JsonResponse([
            $exportData
        ], !isset($exportData['error']) ? 200 : 403);
    }
}
