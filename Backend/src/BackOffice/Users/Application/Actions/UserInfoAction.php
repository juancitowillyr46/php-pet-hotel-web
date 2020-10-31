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

            $success = $this->userService->executeMe($id);
            if($success){
                $success->roleModules = $this->moduleService->executeModuleMenu($success->roleModules);
            }
            return $this->commandSuccess($success);
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}