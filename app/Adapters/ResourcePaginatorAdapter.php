<?php

namespace App\Adapters;

use App\Repositories\Contracts\PaginatorInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ResourcePaginatorAdapter
{
    public function __construct(private string $resourceClass, private object $data)
    {
        return new $resourceClass($data);
    }

    public static function toJson(string $resourceClass, PaginatorInterface $paginator): AnonymousResourceCollection
    {
        return $resourceClass::collection($paginator->items())->additional([
            'meta' => [
                'total' => $paginator->total(),
                'per_page' => $paginator->perPage(),
                'current_page' => $paginator->currentPage(),
                'last_page' => $paginator->lastPage(),
                'from' => $paginator->firstItem(),
                'to' => $paginator->lastItem(),
                'path' => $paginator->path(),
                'prev_page_url' => $paginator->previousPageUrl(),
                'next_page_url' => $paginator->nextPageUrl(),
                'has_more_pages' => $paginator->hasMorePages(),
            ],
        ]);
    }
}