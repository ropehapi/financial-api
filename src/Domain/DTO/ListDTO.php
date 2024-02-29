<?php

namespace App\Domain\DTO;

class ListDTO extends AbstractDTO
{
    public function __construct(
        public ?array $data = [],
        public ?string $message = null
    ){}
}