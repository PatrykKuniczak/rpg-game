<?php

namespace app\models\entities\equipment;

readonly class EquipmentOffenceItem extends EquipmentItem
{
    protected int $dmg;

    public function __construct($name, $requiredLvl, $dmg, $material)
    {
        parent::__construct($name, $requiredLvl, $material);
        $this->dmg = $dmg;
    }
}