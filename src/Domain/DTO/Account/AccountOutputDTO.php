<?php

namespace App\Domain\DTO\Account;

use App\Domain\DTO\AbstractDTO;

class AccountOutputDTO extends AbstractDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public float $balance,
        public $createdAt,
        public $updatedAt
    ){}
}