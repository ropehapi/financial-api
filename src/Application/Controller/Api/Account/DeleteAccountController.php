<?php

namespace App\Application\Controller\Api\Account;

use App\Domain\Service\Account\DeleteAccountService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class DeleteAccountController extends AbstractController
{
    public function __invoke(int $id, DeleteAccountService $service): JsonResponse
    {
        try {
            $service->deleteAccount($id);
        } catch (\Exception $exception) {
            return new JsonResponse([
                'error' => $exception->getMessage()
            ], $exception->getCode());
        }

        return $this->json([
            'message'=>'Account deleted successfully.'
        ]);
    }
}