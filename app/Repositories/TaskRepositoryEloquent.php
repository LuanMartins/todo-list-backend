<?php

namespace App\Repositories;

use App\Adapters\PaginatorEloquentAdapter;
use App\Dtos\CreateTaskDto;
use App\Dtos\UpdateTaskDto;
use App\Models\Task;
use App\Repositories\Contracts\PaginatorInterface;

class TaskRepositoryEloquent implements TaskRepositoryInterface
{
    public function __construct(
        protected Task $model
    ) {}

    public function getPaginate(int $page = 1, string $filter = '', int $totalPerPage = 15): PaginatorInterface
    {
        $records = $this->model->where(function ($query) use ($filter) {
            $query->orWhere('name', 'LIKE', "%{$filter}%");
            // $query->orWhere('email', $filter);
        })->paginate($totalPerPage, ['*'], 'page', $page);

        return new PaginatorEloquentAdapter($records);
    }


    public function findById(string $id): ?object
    {
        return $this->model->find($id);
    }


    public function createNew(CreateTaskDto $dto): ?object
    {
        return $this->model->create((array) $dto);
    }

    public function edit(UpdateTaskDto $dto): ?bool
    {
        if (! $task = $this->findById($dto->id)) {
            return null;
        }

        return $task->update((array) $dto);
    }

    public function remove(string $id): ?bool
    {
        if (! $task = $this->findById($id)) {
            return null;
        }

        return $task->delete($id);
    }
}
