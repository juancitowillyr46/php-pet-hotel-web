<?php


namespace App\BackOffice\Users\Application\Actions;


use App\Shared\Utility\JwtCustom;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class UserInfoAction extends UsersAction
{

    protected function action(): Response
    {
        try {

            $authorization = explode(' ', (string)$this->request->getHeaderLine('Authorization'));
            $token = $authorization[1];
            $jwtCustom = new JwtCustom();
            $verify = $jwtCustom->decodeToken($token);

            $id = $verify->data->id;
            //$roleId = $verify->data->roleId;

            $successUser = $this->userService->executeMe($id);
            //$successUser->roleModules = [];
            $successUser->pets = [];
            $successUser->customer = new \stdClass();
            //$successUser->customerId = "";

            if(is_object($successUser) && ($successUser->roleId != "d2a466ae-d711-496c-9808-ad51abf76175")){
                $successUser->roleModules = $this->moduleService->executeModuleMenu($successUser->roleModules);
            } else {
                $successUser->roleModules = [];
            }

            if($successUser->customerId != ""){
                $successUser->customer = $this->customerService->executeGet($successUser->customerId);
            }

            if(is_object($successUser->customer)){
                $successUser->pets = $this->petService->executeGetAllByIdCustomer(['size' => 100, 'page' => 1, 'customerId' => $successUser->customerId]);
            }

            return $this->commandSuccess($successUser);

        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}