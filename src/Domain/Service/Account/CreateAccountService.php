<?php

namespace App\Domain\Service\Account;

use App\Domain\DTO\Account\CreateUpdateAccountInputDTO;
use App\Domain\DTO\Account\AccountOutputDTO;
use App\Domain\Entity\Account;
use App\Domain\Repository\AccountRepositoryInterface;

class CreateAccountService
{
    private AccountRepositoryInterface $repository;

    public function __construct(AccountRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function createAccount(CreateUpdateAccountInputDTO $dto):AccountOutputDTO
    {
        $account = new Account();
        $account->setName($dto->name);
        $account->setBalance($dto->balance);
        $account->setCreatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));

        $this->repository->add($account, true);

        return new AccountOutputDTO(
            $account->getId(),
            $account->getName(),
            $account->getBalance(),
            $account->getCreatedAt(),
            $account->getUpdatedAt()
        );
    }
}