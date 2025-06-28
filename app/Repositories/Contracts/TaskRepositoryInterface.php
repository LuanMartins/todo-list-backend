<?php

namespace App\Repositories\Contracts;

use App\Dtos\CreateTaskDto;
use App\Dtos\UpdateTaskDto;

interface TaskRepositoryInterface
{
     public function getPaginate(int $page = 1, string $filter = '', int $totalPerPage = 15): PaginatorInterface;

    public function findById(string $id): ?object;

    public function createNew(CreateTaskDto $dto): object;

    public function edit(UpdateTaskDto $dto): ?bool;

    public function remove(string $id): ?bool;

    public function updateStatus(string $id): ?bool;
}
