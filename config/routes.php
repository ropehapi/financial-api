<?php

use App\Application\Controller\Api\AccountController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes): void {
    $routes->add('account_list', '/api/v1/accounts')->controller([AccountController::class, 'index'])->methods(['GET']);
    $routes->add('account_get', '/api/v1/accounts/{id}')->controller([AccountController::class, 'get'])->methods(['GET']);
    $routes->add('account_create', '/api/v1/accounts')->controller([AccountController::class, 'create'])->methods(['POST']);
    $routes->add('account_update', '/api/v1/accounts/{id}')->controller([AccountController::class, 'update'])->methods(['PUT', 'PATCH']);
    $routes->add('account_delete', '/api/v1/accounts/{id}')->controller([AccountController::class, 'delete'])->methods(['DELETE']);
};