<?php

namespace App\Domain\Service\Account;

use App\Domain\DTO\Account\AccountOutputDTO;
use App\Domain\Repository\AccountRepositoryInterface;

class FindAccountService
{
    private AccountRepositoryInterface $repository;

    public function __construct(AccountRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @throws \Exception
     */
    public function findAccount(int $id): AccountOutputDTO
    {
        $account = $this->repository->find($id);
        if (!$account) throw new \Exception('Not found', 404);

        return new AccountOutputDTO(
            $account->getId(),
            $account->getName(),
            $account->getBalance(),
            $account->getCreatedAt(),
            $account->getUpdatedAt()
        );
    }
}