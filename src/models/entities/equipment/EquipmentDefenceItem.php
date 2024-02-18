<?php

namespace app\models\entities\equipment;

abstract readonly class EquipmentDefenceItem extends EquipmentItem
{
    protected int $armorAmount;

    public function __construct($name, $requiredLvl, $armorAmount, $material)
    {
        parent::__construct($name, $requiredLvl, $material);
        $this->armorAmount = $armorAmount;
    }
}