export interface UserDto {
    id:string;
    username: string;
    active: string | boolean;
    activeName: string;
    createdAt: string;
    roleId: string;
    roleName: string;
    blocked: string | boolean;
    blockedName: string;
}
