<?php

namespace App\Services;

interface LanguageInfoServiceInterface
{
    public function getAll(): array;

    public function get(string $name):object;

    public function remove(string $name);

    public function edit(string $name, string $changedProperty, string $propertyName):object;

    public function has(string $name): bool;

    /**
     * Add model to storage
     * @param object $dto - object dto
     * @return void
     */
    public function add(string $name, string $type, ?string $text = null): object;
}