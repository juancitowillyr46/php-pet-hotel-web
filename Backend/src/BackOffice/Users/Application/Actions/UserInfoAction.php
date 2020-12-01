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

            $successUser = $this->userService->executeMe($id);

            if(is_object($successUser) && ($successUser->roleId != "d2a466ae-d711-496c-9808-ad51abf76175")){
                $successUser->roleModules = $this->moduleService->executeModuleMenu($successUser->roleModules);
            } else {
                $successUser->roleModules = [];
            }

            if($verify->data->roleId != '692acd43-45c8-43c4-ae74-0fd58e179925') {

                $successUser->pets = [];
                $successUser->customer = ['firstName' => '', 'image' => ''];

                if($successUser->customerId != ""){
                    $successUser->customer = $this->customerService->executeGet($successUser->customerId);
                }

                if(is_object($successUser->customer)){
                    $successUser->pets = $this->petService->executeGetAllByIdCustomer(['size' => 100, 'page' => 1, 'customerId' => $successUser->customerId]);
                }
            }


            return $this->commandSuccess($successUser);

        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}