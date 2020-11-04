export interface UserStoreDto {
    id: string;
    email?: string;
    username: string;
    password: string;
    active: boolean | string;
    roleId: string;
    blocked: boolean | string;
}


export interface UserPasswordStoreDto {
    id: string;
    password: string;
}
