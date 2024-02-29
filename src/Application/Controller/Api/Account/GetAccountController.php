<?php

namespace App\Application\Controller\Api\Account;

use App\Domain\Service\Account\GetAccountService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetAccountController extends AbstractController
{
    public function __invoke(GetAccountService $service): JsonResponse
    {
        $dto = $service->getAccounts();

        return $this->json($dto->data());
    }
}