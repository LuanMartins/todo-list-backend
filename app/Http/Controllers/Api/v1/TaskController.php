<?php

namespace App\Http\Controllers\Api\v1;

use App\Adapters\ResourcePaginatorAdapter;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
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
}
