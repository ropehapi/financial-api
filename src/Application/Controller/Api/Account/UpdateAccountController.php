<?php

namespace App\Application\Controller\Api\Account;

use App\Domain\DTO\Account\CreateUpdateAccountInputDTO;
use App\Domain\Service\Account\UpdateAccountService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UpdateAccountController extends AbstractController
{
    public function __invoke(int $id, Request $request, UpdateAccountService $service): JsonResponse
    {
        $data = $request->toArray();
        $dto = new CreateUpdateAccountInputDTO(
            $data['name'],
            $data['balance']
        );

        try {
            $dto = $service->updateAccount($id, $dto);
        } catch (\Exception $exception) {
            return new JsonResponse([
                'error' => $exception->getMessage()
            ], $exception->getCode());
        }


        return $this->json($dto->all());
    }
}