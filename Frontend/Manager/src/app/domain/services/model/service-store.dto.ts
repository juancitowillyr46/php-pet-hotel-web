export interface ServiceStoreDto {
    id?: string;
    name: string;
    description: string;
    price: string;
    serviceTypeId: string;
    active: boolean;
    main?: boolean;
    image: string;
}
