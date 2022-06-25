<?php

namespace App\Controller;

use App\Geometry\ExposeGeometry;
use App\Geometry\Triangle;
use App\Services\GeometryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TriangleController extends AbstractController
{
    private $exposeGeometry;
    private $geometryService;

    public function __construct(ExposeGeometry $exposeGeometry, GeometryService $geometryService)
    {
        $this->exposeGeometry = $exposeGeometry;
        $this->geometryService = $geometryService;
    }

    #[Route('/triangle/{a}/{b}/{c}', name: 'app_triangle')]
    public function index(float $a, float $b, float $c): JsonResponse
    {
        $triangle = new Triangle($a, $b, $c);

        $exportData = $this->exposeGeometry->expose($triangle);

        $exportData['sum_surface'] = $this->geometryService->calcSumSurfaces($triangle, $triangle);

        return new JsonResponse([
            $exportData
        ], !isset($exportData['error']) ? 200 : 403);
    }
}
