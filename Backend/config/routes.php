<?php
declare(strict_types=1);

use App\Shared\Middleware\AuthValidateTokenMiddleware;
use Slim\App;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
//use App\BackOffice\Home\Application\Actions\HelloWorldAction;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
//    $app->get('/', HelloWorldAction::class);

    $app->group('/api', function (RouteCollectorProxy $group) {

        $group->group('/security', function (RouteCollectorProxy $group) {
            $group->post('/web/register', \App\BackOffice\Security\Application\Actions\RegisterWebAction::class);
            $group->post('/web/login', \App\BackOffice\Security\Application\Actions\LoginWebAction::class);
            $group->post('/manager/login', \App\BackOffice\Security\Application\Actions\LoginManagerAction::class);
            $group->get('/search', \App\BackOffice\Transactions\Application\Actions\TransactionFindAllAction::class);
            $group->get('/me', \App\BackOffice\Users\Application\Actions\UserInfoAction::class)->add(AuthValidateTokenMiddleware::class);
            $group->post('/transaction', \App\BackOffice\Transactions\Application\Actions\TransactionAddAction::class)
                ->add(AuthValidateTokenMiddleware::class);
            $group->get('/transaction/mailling', \App\BackOffice\Transactions\Application\Actions\TransactionMaillingsAction::class);
        });

        $group->group('/modules', function (RouteCollectorProxy $group) {
            $group->post('', \App\BackOffice\Modules\Application\Actions\ModuleAddAction::class);
            $group->put('/{uuid}', \App\BackOffice\Modules\Application\Actions\ModuleEditAction::class);
            $group->get('/{uuid}', \App\BackOffice\Modules\Application\Actions\ModuleFindAction::class);
            $group->delete('/{uuid}', \App\BackOffice\Modules\Application\Actions\ModuleRemoveAction::class);
            $group->get('', \App\BackOffice\Modules\Application\Actions\ModuleFindAllAction::class);
        })->add(AuthValidateTokenMiddleware::class);

        $group->group('/roles', function (RouteCollectorProxy $group) {
            $group->post('', \App\BackOffice\Roles\Application\Actions\RoleAddAction::class);
            $group->put('/{uuid}', \App\BackOffice\Roles\Application\Actions\RoleEditAction::class);
            $group->get('/{uuid}', \App\BackOffice\Roles\Application\Actions\RoleFindAction::class);
            $group->delete('/{uuid}', \App\BackOffice\Roles\Application\Actions\RoleRemoveAction::class);
            $group->get('', \App\BackOffice\Roles\Application\Actions\RoleFindAllAction::class);
        })->add(AuthValidateTokenMiddleware::class);

        $group->group('/users', function (RouteCollectorProxy $group) {
            $group->post('', \App\BackOffice\Users\Application\Actions\UserAddAction::class);
            $group->put('/{uuid}', \App\BackOffice\Users\Application\Actions\UserEditAction::class);
            $group->get('/{uuid}', \App\BackOffice\Users\Application\Actions\UserFindAction::class);
            $group->delete('/{uuid}', \App\BackOffice\Users\Application\Actions\UserRemoveAction::class);
            $group->get('', \App\BackOffice\Users\Application\Actions\UserFindAllAction::class);
            $group->put('/{uuid}/change-password', \App\BackOffice\Users\Application\Actions\UserEditPasswordAction::class);

        })->add(AuthValidateTokenMiddleware::class);

        $group->group('/customers', function (RouteCollectorProxy $group) {
            $group->post('', \App\BackOffice\Customers\Application\Actions\CustomerAddAction::class);
            $group->get('/{uuid}', \App\BackOffice\Customers\Application\Actions\CustomerFindAction::class);
            $group->get('', \App\BackOffice\Customers\Application\Actions\CustomerFindAllAction::class);
            $group->put('/{uuid}', \App\BackOffice\Customers\Application\Actions\CustomerEditAction::class);
            $group->delete('/{uuid}', \App\BackOffice\Customers\Application\Actions\CustomerRemoveAction::class);
        })->add(AuthValidateTokenMiddleware::class);

        $group->group('/pets', function (RouteCollectorProxy $group) {
            $group->post('', \App\BackOffice\Pets\Application\Actions\PetAddAction::class);
            $group->get('/{uuid}', \App\BackOffice\Pets\Application\Actions\PetFindAction::class);
            $group->get('', \App\BackOffice\Pets\Application\Actions\PetFindAllAction::class);
            $group->put('/{uuid}', \App\BackOffice\Pets\Application\Actions\PetEditAction::class);
            $group->delete('/{uuid}', \App\BackOffice\Pets\Application\Actions\PetRemoveAction::class);
        })->add(AuthValidateTokenMiddleware::class);

        $group->group('/services', function (RouteCollectorProxy $group) {
            $group->post('', \App\BackOffice\Services\Application\Actions\ServiceAddAction::class);
            $group->get('/{uuid}', \App\BackOffice\Services\Application\Actions\ServiceFindAction::class);
            $group->get('', \App\BackOffice\Services\Application\Actions\ServiceFindAllAction::class);
            $group->put('/{uuid}', \App\BackOffice\Services\Application\Actions\ServiceEditAction::class);
            $group->delete('/{uuid}', \App\BackOffice\Services\Application\Actions\ServiceRemoveAction::class);
        })->add(AuthValidateTokenMiddleware::class);

        $group->group('/kennels', function (RouteCollectorProxy $group) {
            $group->post('', \App\BackOffice\Kennels\Application\Actions\KennelAddAction::class);
            $group->get('/{uuid}', \App\BackOffice\Kennels\Application\Actions\KennelFindAction::class);
            $group->get('', \App\BackOffice\Kennels\Application\Actions\KennelFindAllAction::class);
            $group->put('/{uuid}', \App\BackOffice\Kennels\Application\Actions\KennelEditAction::class);
            $group->delete('/{uuid}', \App\BackOffice\Kennels\Application\Actions\KennelRemoveAction::class);
        })->add(AuthValidateTokenMiddleware::class);

        $group->group('/data-master', function (RouteCollectorProxy $group) {
            $group->post('', \App\BackOffice\DataMaster\Application\Actions\DataMasterAddAction::class);
            $group->get('/{uuid}', \App\BackOffice\DataMaster\Application\Actions\DataMasterFindAction::class);
            $group->get('', \App\BackOffice\DataMaster\Application\Actions\DataMasterFindAllAction::class);
            $group->put('/{uuid}', \App\BackOffice\DataMaster\Application\Actions\DataMasterEditAction::class);
            $group->delete('/{uuid}', \App\BackOffice\DataMaster\Application\Actions\DataMasterRemoveAction::class);
        })->add(AuthValidateTokenMiddleware::class);

        $group->group('/payments', function (RouteCollectorProxy $group) {
            $group->post('', \App\BackOffice\Payments\Application\Actions\PaymentAddAction::class);
            $group->get('/{uuid}', \App\BackOffice\Payments\Application\Actions\PaymentFindAction::class);
            $group->get('', \App\BackOffice\Payments\Application\Actions\PaymentFindAllAction::class);
            $group->put('/{uuid}', \App\BackOffice\Payments\Application\Actions\PaymentEditAction::class);
            $group->put('/{uuid}/update-state', \App\BackOffice\Payments\Application\Actions\PaymentEditStateAction::class);
            $group->delete('/{uuid}', \App\BackOffice\Payments\Application\Actions\PaymentRemoveAction::class);
            $group->get('/booking/{uuid}', \App\BackOffice\Payments\Application\Actions\PaymentRemoveAction::class);
        })->add(AuthValidateTokenMiddleware::class);

        $group->group('/bookings', function (RouteCollectorProxy $group) {
            $group->post('', \App\BackOffice\Bookings\Application\Actions\BookingAddAction::class);
            $group->get('/{uuid}', \App\BackOffice\Bookings\Application\Actions\BookingFindAction::class);
            $group->get('', \App\BackOffice\Bookings\Application\Actions\BookingFindAllAction::class);
            $group->put('/{uuid}', \App\BackOffice\Bookings\Application\Actions\BookingEditAction::class);
            $group->put('/{uuid}/update-state', \App\BackOffice\Bookings\Application\Actions\BookingEditStateAction::class);
            $group->delete('/{uuid}', \App\BackOffice\Bookings\Application\Actions\BookingRemoveAction::class);
        })->add(AuthValidateTokenMiddleware::class);

        $group->group('/commons', function (RouteCollectorProxy $group) {
            $group->get('/data-master/{type}', \App\BackOffice\DataMaster\Application\Actions\DataMasterCommonAction::class);
            $group->get('/roles', \App\BackOffice\Roles\Application\Actions\RoleCommonAction::class);
            $group->get('/type-services', \App\BackOffice\Services\Application\Actions\ServiceTypeCommonAction::class);
        })->add(AuthValidateTokenMiddleware::class);

        $group->group('/contacts', function (RouteCollectorProxy $group) {
            $group->post('', \App\BackOffice\Contacts\Application\Actions\ContactAddAction::class);
            $group->get('/{uuid}', \App\BackOffice\Contacts\Application\Actions\ContactFindAction::class)->add(AuthValidateTokenMiddleware::class);
            $group->get('', \App\BackOffice\Contacts\Application\Actions\ContactFindAllAction::class)->add(AuthValidateTokenMiddleware::class);
            $group->put('/{uuid}', \App\BackOffice\Contacts\Application\Actions\ContactEditAction::class)->add(AuthValidateTokenMiddleware::class);
            $group->delete('/{uuid}', \App\BackOffice\Contacts\Application\Actions\ContactRemoveAction::class)->add(AuthValidateTokenMiddleware::class);
        });

    });

};