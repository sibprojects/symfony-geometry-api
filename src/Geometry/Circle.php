<?php

namespace App\Geometry;

class Circle extends GeometryObject
{
    private float $radius;

    public const GEOMETRY_NAME = 'Circle';

    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    public function getParams(): array
    {
        $result = parent::getParams();
        return $result + [
            'radius' => $this->radius,
        ];
    }

    public function calcCircumference(): float
    {
        return round(2 * 3.142 * $this->radius, 2);
    }

    public function calcSurface(): float
    {
        return round(pow($this->radius,2) * 3.142, 2);
    }

    public function checkExists(): bool
    {
        return $this->radius > 0;
    }

    public function getRadius(): float
    {
        return $this->radius;
    }
}