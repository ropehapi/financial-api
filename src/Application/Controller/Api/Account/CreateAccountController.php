<?php

namespace App\Application\Controller\Api\Account;

use App\Domain\DTO\Account\CreateUpdateAccountInputDTO;
use App\Domain\DTO\DTOValidator;
use App\Domain\Service\Account\CreateAccountService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CreateAccountController extends AbstractController
{
    public function __invoke(Request $request, DTOValidator $dtoValidator, CreateAccountService $service): JsonResponse
    {
        $data = $request->toArray();
        $dto = new CreateUpdateAccountInputDTO(
            $data['name'],
            $data['balance'],
        );

        if (!empty($errors = $dtoValidator->validate($dto))){
            return new JsonResponse($errors, 400);
        }

        $dto = $service->createAccount($dto);

        return $this->json($dto->all(), 201);
    }
}