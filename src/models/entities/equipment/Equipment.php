<?php

namespace app\models\entities\equipment;

class Equipment
{
    private EquipmentOffenceItem $sword;
    private EquipmentDefenceItem $armor;
    private EquipmentDefenceItem $trousers;
    private EquipmentDefenceItem $shoes;
    private EquipmentDefenceItem $helmet;

    public function __construct($sword, $armor, $trousers, $shoes, $helmet)
    {
        $this->sword = $sword;
        $this->armor = $armor;
        $this->trousers = $trousers;
        $this->shoes = $shoes;
        $this->helmet = $helmet;
    }
}