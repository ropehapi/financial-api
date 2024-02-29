<?php

namespace App\Application\Controller\Api;

use App\Domain\Entity\Account;
use App\Infrastructure\Repository\AccountRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class AccountController extends AbstractController
{
    #[Route('/accounts', name: 'account_list', methods: ['GET'])]
    public function index(AccountRepository $repository): JsonResponse
    {
        $accounts = $repository->findAll();

        return $this->json([
            'data' => $accounts
        ]);
    }

    #[Route('/accounts/{id}', name: 'account_find', methods: ['GET'])]
    public function get(int $id, AccountRepository $repository): JsonResponse
    {
        $account = $repository->find($id);

        if(!$account) throw $this->createNotFoundException();

        return $this->json([
            'data' => $account
        ]);
    }

    #[Route('/accounts', name: 'account_create', methods: ['POST'])]
    public function create(Request $request, AccountRepository $repository): JsonResponse
    {
        $data = $request->toArray();

        $account = new Account();
        $account->setName($data['name']);
        $account->setBalance($data['balance']);
        $account->setCreatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));

        $repository->add($account, true);

        return $this->json([
            'message' => 'Account created successfully.',
            'account' => $account
        ], 201);
    }

    #[Route('/accounts/{id}', name: 'account_update', methods: ['PUT', 'PATCH'])]
    public function update(int $id, Request $request, AccountRepository $repository): JsonResponse
    {
        $account = $repository->find($id);
        if(!$account) throw $this->createNotFoundException();

        $data = $request->toArray();
        $account->setName($data['name']);
        $account->setBalance($data['balance']);
        $account->setUpdatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));

        $repository->add($account, true);

        return $this->json([
            'message' => 'Account updated successfully.',
            'account' => $account
        ]);
    }

    #[Route('/accounts/{id}', name: 'account_remove', methods: ['DELETE'])]
    public function delete(int $id, AccountRepository $repository): JsonResponse
    {
        $account = $repository->find($id);
        if(!$account) throw $this->createNotFoundException();

        $repository->remove($account, true);

        return $this->json([
            'message' => 'Account removed successfully.',
        ]);
    }
}
