<?php

namespace App\Domain\Service\Account;

use App\Domain\DTO\Account\AccountOutputDTO;
use App\Domain\DTO\ListDTO;
use App\Domain\Repository\AccountRepositoryInterface;

class GetAccountService
{
    private AccountRepositoryInterface $repository;

    public function __construct(AccountRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAccounts():ListDTO
    {
        $accounts = $this->repository->findAll();

        $dto = new ListDTO();
        foreach ($accounts as $account){
            $dto->append(new AccountOutputDTO(
                $account->getId(),
                $account->getName(),
                $account->getBalance(),
                $account->getCreatedAt(),
                $account->getUpdatedAt()
            ));
        }

        return $dto;
    }
}