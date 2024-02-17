<?php

declare(strict_types=1);

namespace app\core;

final class Database
{
    /**
     * @var \array[object[]]
     */
    private static array $dummy_database;

    public static function create(string $entityName, object $value): object
    {
        self::$dummy_database[$entityName][] = $value;
        return $value;
    }

    public static function delete(string $entityName, int $key): string
    {
        if (array_key_exists($key, self::$dummy_database[$entityName])) {
            unset(self::$dummy_database[$entityName][$key]);
            return 'SUCCESSFULLY DELETED';
        } else {
            return 'NOT FOUND';
        }

    }

    public static function edit(string $entityName, int $key, string $column, string $newValue): string
    {
        if (array_key_exists($key, self::$dummy_database[$entityName])) {
            self::$dummy_database[$entityName][$key]->$column = $newValue;
            return 'SUCCESSFULLY UPDATED';
        } else {
            return 'NOT FOUND';
        }

    }

    public static function findIndex(string $entityName, string $column, string $value): int|string
    {
        $itemIndex = array_search(self::findOneBy($entityName, $column, $value), self::$dummy_database[$entityName]);

        if (is_int($itemIndex)) {
            return $itemIndex;
        } else {
            return 'NOT FOUND';
        }
    }

    public static function findOneBy(string $entityName, string $column, string $value): object|string
    {
        $itemIndex = array_search($value, array_column(self::$dummy_database[$entityName], $column));

        if (is_int($itemIndex)) {
            return self::$dummy_database[$entityName][$itemIndex];
        } else {
            return 'NOT FOUND';
        }
    }

    public static function findAll(string $entityName, string $column = null): array
    {
        if (!empty($column)) {
            return array_column(self::$dummy_database[$entityName], $column);
        } else {
            return self::$dummy_database[$entityName];
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