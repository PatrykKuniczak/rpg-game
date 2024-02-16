<?php

declare(strict_types=1);

namespace app\core;

final class Database
{
    /**
     * @var \array[][]
     */
    private static array $dummy_database;

    private static function __init__()
    {
        $initTables = function ($entity) {
            return [$entity->name => []];
        };

        self::$dummy_database = array_map($initTables, EntitiesEnum::cases());
    }
}

(static function () {
    Database::__init__();
})->bindTo(null, Database::class)();