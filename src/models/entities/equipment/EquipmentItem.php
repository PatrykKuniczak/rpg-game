<?php

namespace app\models\entities\equipment;

abstract readonly class EquipmentItem
{
    protected string $name;
    protected int $requiredLvl;
    protected int $material;

    public function __construct($name, $requiredLvl, $material)
    {
        $this->name = $name;
        $this->requiredLvl = $requiredLvl;
        $this->material = $material;
    }
}