<?php

namespace App\Domain\Service\Account;

use App\Domain\DTO\Account\AccountOutputDTO;
use App\Domain\DTO\Account\CreateUpdateAccountInputDTO;
use App\Domain\Repository\AccountRepositoryInterface;

class UpdateAccountService
{
    private AccountRepositoryInterface $repository;

    public function __construct(AccountRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function updateAccount(int $id, CreateUpdateAccountInputDTO $dto): AccountOutputDTO
    {
        $account = $this->repository->find($id);
        if(!$account) throw new \Exception('Not found', 404);

        $account->setName($dto->name??$account->getName());
        $account->setBalance($dto->balance??$account->getBalance());
        $account->setUpdatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));

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