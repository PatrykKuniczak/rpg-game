<?php

namespace app\core;

abstract class Model
{
    const string TABLE_NAME = self::TABLE_NAME;

    public function delete(string $column, string $value): string
    {
        return Database::delete(self::TABLE_NAME, $column, $value);
    }

    public function findAll(): array
    {
        return Database::findAll(self::TABLE_NAME);
    }

    public function edit(string $column, string $oldValue, string $newValue): string
    {
        return Database::edit(self::TABLE_NAME, $column, $oldValue, $newValue);
    }

    public function findOneBy(string $column, string $value): object|string
    {
        return Database::findOneBy(self::TABLE_NAME, $column, $value);
    }

    protected function create(object $value): object
    {
        return Database::create(self::TABLE_NAME, $value);
    }
}

