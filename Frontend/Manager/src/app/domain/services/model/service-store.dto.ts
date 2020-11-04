export interface ServiceStoreDto {
    id?: string;
    serviceTypeId: string;
    name: string;
    description: string;
    price: string;
    active: boolean;
    main?: boolean;
    image?: string;
}
