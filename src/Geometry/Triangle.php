<?php

namespace App\Geometry;

class Triangle extends GeometryObject
{
    private float $a;
    private float $b;
    private float $c;

    public const GEOMETRY_NAME = 'Triangle';

    public function __construct(float $a, float $b, float $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function getParams(): array
    {
        $result = parent::getParams();
        return $result + [
            'a' => $this->a,
            'b' => $this->b,
            'c' => $this->c,
        ];
    }

    public function calcCircumference(): float
    {
        return $this->a + $this->b + $this->c;
    }

    public function calcSurface(): float
    {
        $semiperimeter = $this->calcCircumference() / 2;

        $result = (
            $semiperimeter * (
                ($semiperimeter - $this->a) *
                ($semiperimeter - $this->b) *
                ($semiperimeter - $this->c)
            )
        );

        return round($result, 2);
    }

    public function checkExists(): bool
    {
        if (
            $this->a < ($this->b + $this->c) &&
            $this->b < ($this->a + $this->c) &&
            $this->c < ($this->a + $this->b)
        ) {
            return true;
        } else {
            return false;
        }
    }
    public function getSideA(): float
    {
        return $this->a;
    }
    public function getSideB(): float
    {
        return $this->b;
    }
    public function getSideC(): float
    {
        return $this->c;
    }
}