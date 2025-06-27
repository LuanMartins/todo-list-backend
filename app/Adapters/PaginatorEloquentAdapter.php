<?php

namespace App\Adapters;

use App\Repositories\Contracts\PaginatorInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\LengthAwarePaginator as PaginationLengthAwarePaginator;

class PaginatorEloquentAdapter extends PaginationLengthAwarePaginator implements PaginatorInterface
{
    public function __construct(protected LengthAwarePaginator $paginator)
    {
    }

    public function total(): int
    {
        return (int) $this->paginator->total();
    }

    public function lastPage(): int
    {
        return (int) $this->paginator->lastPage();
    }

    public function appends($key, $value = null): self
    {
        $this->paginator->appends($key, $value);

        return $this;
    }

    public function nextPageUrl(): ?string
    {
        return $this->paginator->nextPageUrl();
    }

    public function previousPageUrl(): ?string
    {
        return $this->paginator->previousPageUrl();
    }

    public function items(): array
    {
        return $this->paginator->items();
    }

    public function firstItem(): ?int
    {
        return $this->paginator->firstItem();
    }

    public function lastItem(): ?int
    {
        return $this->paginator->lastItem();
    }

    public function perPage(): int
    {
        return $this->paginator->perPage();
    }

    public function currentPage(): int
    {
        return $this->paginator->currentPage();
    }

    public function hasPages(): bool
    {
        return $this->paginator->hasPages();
    }

    public function hasMorePages(): bool
    {
        return $this->paginator->hasMorePages();
    }

    public function path(): ?string
    {
        return $this->paginator->path();
    }

    public function isEmpty(): bool
    {
        return $this->paginator->isEmpty();
    }

    public function isNotEmpty(): bool
    {
        return $this->paginator->isNotEmpty();
    }
}