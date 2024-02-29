<?php

namespace App\Application\Controller\Api\Account;

use App\Domain\Service\Account\FindAccountService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class FindAccountController extends AbstractController
{
    public function __invoke(int $id, FindAccountService $service): JsonResponse
    {
        try {
            $account = $service->findAccount($id);
        } catch (\Exception $exception) {
            return new JsonResponse([
                'error' => $exception->getMessage()
            ], $exception->getCode());
        }

        return $this->json($account->all());
    }
}