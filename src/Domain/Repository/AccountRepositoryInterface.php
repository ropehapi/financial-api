<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Account;

interface AccountRepositoryInterface
{
    public function add(Account $entity, bool $flush = false): void;

    public function remove(Account $entity, bool $flush = false): void;
}