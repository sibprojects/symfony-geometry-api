<?php

namespace App\Geometry;

class ExposeGeometry
{
    public function expose(GeometryObject $geometryObject): array
    {
        $result = $geometryObject->getParams();

        if(!$geometryObject->checkExists()) {
            $result["error"] = $geometryObject::GEOMETRY_ERROR;
        } else {
            $result["surface"] = $geometryObject->calcSurface();
            $result["circumference"] = $geometryObject->calcCircumference();
        }

        return $result;
    }
}