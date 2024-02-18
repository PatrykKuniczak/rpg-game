<?php

namespace app\core;

interface Controller
{
    public function create(array $values): object;

    public function delete(string $column, string $value): string;

    public function findAll(): array;

    public function edit(string $column, string $oldValue, string $newValue): string;

    public function findOneBy(string $column, string $value): object|string;
}