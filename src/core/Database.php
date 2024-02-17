<?php

declare(strict_types=1);

namespace app\core;

final class Database
{
    /**
     * @var \array[object[]]
     */
    private static array $dummy_database;

    public static function create(string $tableName, object $value): object
    {
        self::$dummy_database[$tableName][] = $value;
        return $value;
    }

    public static function delete(string $tableName, int $index): string
    {
        if (array_key_exists($index, self::$dummy_database[$tableName])) {
            unset(self::$dummy_database[$tableName][$index]);
            return 'SUCCESSFULLY DELETED';
        } else {
            return 'NOT FOUND';
        }

    }

    public static function edit(string $tableName, int $index, string $column, string $newValue): string
    {
        if (array_key_exists($index, self::$dummy_database[$tableName])) {
            self::$dummy_database[$tableName][$index]->$column = $newValue;
            return 'SUCCESSFULLY UPDATED';
        } else {
            return 'NOT FOUND';
        }

    }

    public static function findIndex(string $tableName, string $column, string $value): int|string
    {
        $itemIndex = array_search(self::findOneBy($tableName, $column, $value), self::$dummy_database[$tableName]);

        if (is_int($itemIndex)) {
            return $itemIndex;
        } else {
            return 'NOT FOUND';
        }
    }

    public static function findOneBy(string $tableName, string $column, string $value): object|string
    {
        $itemIndex = array_search($value, array_column(self::$dummy_database[$tableName], $column));

        if (is_int($itemIndex)) {
            return self::$dummy_database[$tableName][$itemIndex];
        } else {
            return 'NOT FOUND';
        }
    }

    public static function findAll(string $tableName, string $column = null): array
    {
        if (!empty($column)) {
            return array_column(self::$dummy_database[$tableName], $column);
        } else {
            return self::$dummy_database[$tableName];
        }
    }

    private static function __init__(): void
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