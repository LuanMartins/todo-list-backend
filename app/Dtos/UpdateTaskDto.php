<?php

namespace App\Dtos;

readonly class UpdateTaskDto
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public string $title,
        public string $description,
        public bool $completed
    ) {}
}
