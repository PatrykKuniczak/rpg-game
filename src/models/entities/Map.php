<?php

namespace app\models\entities;

class Map
{
    private string $name;
    private int $requiredLvlToJoin;
    private int $mobsAmount;

    private array $mobs;
    private float $respTime;

    public function __construct($name, $requiredLvlToJoin, $mobsAmount, $mobs, $respTime)
    {
        $this->name = $name;
        $this->requiredLvlToJoin = $requiredLvlToJoin;
        $this->mobs = $mobs;
        $this->mobsAmount = $mobsAmount;
        $this->respTime = $respTime;
    }
}