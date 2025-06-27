<?php

namespace App\Dtos;

readonly class CreateTaskDto
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public string $title,
        public string $description,
        public bool $completed = false
    ) {}
}
