<?php
// config/routes.php
use App\Application\Controller\Api\AccountController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes): void {
    $routes->add('account_list', '/accounts')
        // the controller value has the format [controller_class, method_name]
        ->controller([AccountController::class, 'index'])
        ->methods(['GET'])

        // if the action is implemented as the __invoke() method of the
        // controller class, you can skip the 'method_name' part:
        // ->controller(BlogController::class)
    ;

    $routes->add('account_create', '/accounts')
        ->controller([AccountController::class, 'create'])
        ->methods(['POST'])
    ;
};