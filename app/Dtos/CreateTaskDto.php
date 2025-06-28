<?php

namespace App\Dtos;

readonly class CreateTaskDto
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public string $nome,
        public string $descricao,
        public string $data_limite,
        public bool $finalizado = false
    ) {}
}
