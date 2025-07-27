<?php

namespace App\Reposotories;


interface RepositoryInterface 
{
    public function getAll(): array;

    public function get(object $dto):object;

    public function remove(object $dto);

    public function edit(object $dto):object;

    public function has(object $dto): bool;

    /**
     * Add model to storage
     * @param object $dto - object dto
     * @return void
     */
    public function add(object $dto): object;
}