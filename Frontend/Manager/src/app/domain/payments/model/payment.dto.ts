export interface PaymentDto {
    id: string;
    ticket: string;
    active: boolean;
    activeName: string;
    createdAt: string;
    total: number;
    billingFirstName: string;
    billingLastName: string;
    billingAddress: string;
    billingPhone: string;
    billingEmail: string;
    billingDni: string;
    paymentMethodId: string;
    paymentMethodName: string;
    bankId: string;
    stateName: string;
    stateId: string;
    bankName: string;
    orders: any[];
}
