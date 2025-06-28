<?php

namespace App\Dtos;

readonly class UpdateTaskDto
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public string $id,
        public string $nome,
        public string $descricao,
        public string $data_limite,
        public bool $finalizado,
    ) {}
}
