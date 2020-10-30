<?php


namespace App\BackOffice\Users\Domain\Entities;


class UserInfoDto
{
    public string $username;
    public string $email;
//    public string $roleId;
    public string $roleName;
    public array $menu;
}
