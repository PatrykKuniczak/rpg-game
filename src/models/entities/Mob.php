<?php

namespace app\models\entities;

class Mob
{
    private string $name;
    private int $lvl;
    private int $expToEarn;
    private string $type;
    private int $hp;

    public function __construct($name, $lvl, $expToEarn, $type, $hp)
    {
        $this->name = $name;
        $this->lvl = $lvl;
        $this->expToEarn = $expToEarn;
        $this->type = $type;
        $this->hp = $hp;
    }
}