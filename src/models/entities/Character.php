<?php

namespace app\models\entities;

class Character
{
    private string $name;
    private string $sex;
    private string $height;
    private int $age;
    private string $class;
    private int $hp;
    // TODO: PO DODANIU EQUIPMENT ZMIEN
    private mixed $equipment;
    private int $currentExp;
    private int $requiredExpForNextLvl;

    public function __construct($name, $sex, $height, $age, $class, $hp, $equipment, $currentExp, $requiredExpForNextLvl)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->height = $height;
        $this->age = $age;
        $this->class = $class;
        $this->hp = $hp;
        $this->equipment = $equipment;
        $this->currentExp = $currentExp;
        $this->requiredExpForNextLvl = $requiredExpForNextLvl;
    }
}