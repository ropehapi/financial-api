<?php

use App\Application\Controller\Api\Account\CreateAccountController;
use App\Application\Controller\Api\Account\DeleteAccountController;
use App\Application\Controller\Api\Account\FindAccountController;
use App\Application\Controller\Api\Account\GetAccountController;
use App\Application\Controller\Api\Account\UpdateAccountController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes): void {
    $routes->add('account_list', '/api/v1/accounts')->controller(GetAccountController::class)->methods(['GET']);
    $routes->add('account_get', '/api/v1/accounts/{id}')->controller(FindAccountController::class)->methods(['GET']);
    $routes->add('account_create', '/api/v1/accounts')->controller(CreateAccountController::class)->methods(['POST']);
    $routes->add('account_update', '/api/v1/accounts/{id}')->controller(UpdateAccountController::class)->methods(['PUT', 'PATCH']);
    $routes->add('account_delete', '/api/v1/accounts/{id}')->controller(DeleteAccountController::class)->methods(['DELETE']);
};