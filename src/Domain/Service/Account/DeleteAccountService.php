<?php

namespace App\Domain\Service\Account;

use App\Domain\Repository\AccountRepositoryInterface;

class DeleteAccountService
{
    private AccountRepositoryInterface $repository;

    public function __construct(AccountRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function deleteAccount(int $id):void
    {
        $account = $this->repository->find($id);
        if(!$account) throw new \Exception('Not found', 404);

        $this->repository->remove($account, true);
    }
}