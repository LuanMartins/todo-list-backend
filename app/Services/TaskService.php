<?php

namespace App\Services;

use App\Dtos\CreateTaskDto;
use App\Dtos\UpdateTaskDto;
use App\Repositories\Contracts\PaginatorInterface;
use App\Repositories\Contracts\TaskRepositoryInterface;

class TaskService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private TaskRepositoryInterface $repository)
    {
        
    }

    public function getPaginate(int $page = 1, string $filter = '', int $totalPerPage = 15): PaginatorInterface
    {
        return $this->repository->getPaginate(
            page: $page,
            filter: $filter,
            totalPerPage: $totalPerPage
        );
    }


    public function findById(string $id): ?object
    {
        return $this->repository->findById($id);
    }

    public function create(CreateTaskDto $dto): ?object
    {
        return $this->repository->createNew($dto);
    }


    public function update(UpdateTaskDto $dto): ?bool
    {
        return $this->repository->edit($dto);
    }

    public function delete(string $id): ?bool
    {
        return $this->repository->remove($id);
    }
}
