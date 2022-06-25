<?php

namespace App\Geometry;

abstract class GeometryObject
{
    public const GEOMETRY_NAME = 'Abstract geometry object';

    public const GEOMETRY_ERROR = 'Geometry object with this params is not exists!';

    public function getParams(): array
    {
        return [
            'type' => static::GEOMETRY_NAME,
        ];
    }

    abstract function checkExists(): bool;

    abstract function calcCircumference(): float;

    abstract function calcSurface(): float;
}