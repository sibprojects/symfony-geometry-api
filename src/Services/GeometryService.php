<?php

namespace App\Services;

use App\Geometry\Circle;
use App\Geometry\GeometryObject;

class GeometryService
{
    public function calcSumSurfaces(GeometryObject $obj1, GeometryObject $obj2): float
    {
        return $obj1->calcSurface() + $obj2->calcSurface();
    }

    public function calcSumDiameter(Circle $obj1, Circle $obj2): float
    {
        return ($obj1->getRadius() * 2) + ($obj2->getRadius() * 2);
    }
}