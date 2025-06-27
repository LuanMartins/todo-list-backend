<?php

namespace App\Repositories\Contracts;

interface PaginatorInterface
{
    public function total(): int;

    public function lastPage(): int;

    public function appends($key, $value = null): self;

    public function nextPageUrl(): ?string;

    public function previousPageUrl(): ?string;

    public function items(): array;

    public function firstItem(): ?int;

    public function lastItem(): ?int;

    public function perPage(): int;

    public function currentPage(): int;

    public function hasPages(): bool;

    public function hasMorePages(): bool;

    public function path(): ?string;

    public function isEmpty(): bool;

    public function isNotEmpty(): bool;
}