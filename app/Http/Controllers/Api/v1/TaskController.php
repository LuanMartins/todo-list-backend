<?php

namespace App\Http\Controllers\Api\v1;

use App\Adapters\ResourcePaginatorAdapter;
use App\Dtos\CreateTaskDto;
use App\Dtos\UpdateTaskDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Services\TaskService;
use App\Traits\HttpResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskController extends Controller
{
    use HttpResponseTrait;

    public function __construct(private TaskService $service) {}


    public function index(Request $request)
    {
        $tasks = $this->service->getPaginate(
            page: (int) $request->page ?? 1,
            filter: $request->filter ?? '',
            totalPerPage: (int) $request->total_per_page ?? 15
        );

        return ResourcePaginatorAdapter::toJson(TaskResource::class, $tasks);
    }


    public function store(CreateTaskRequest $request): JsonResource
    {
        $task = $this->service->create(new CreateTaskDto(...$request->validated()));

        return new TaskResource($task);
    }

    public function show(string $id): JsonResource|JsonResponse
    {
        $task = $this->service->findById($id);

        return ! $task ? $this->notFound() : new TaskResource($task);
    }


    public function update(UpdateTaskRequest $request, string $id): JsonResponse
    {
        $task = $this->service->update(new UpdateTaskDto($id, ...$request->validated()));

        return ! $task ? $this->notFound() : $this->ok('Task updated');
    }

    public function destroy(string $id): JsonResponse
    {
        $task = $this->service->delete($id);

        return ! $task ? $this->notFound() : $this->ok('Task deleted');
    }
}
