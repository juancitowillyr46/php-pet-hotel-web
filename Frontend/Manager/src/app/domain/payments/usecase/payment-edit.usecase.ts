import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { PaymentRepository } from "../repository/payment.repository";
import { map } from 'rxjs/operators';
import { PaymentStoreDto } from '../model/payment-store.dto';
import { ResponseIdDataDto } from '../../../core/entities/response-id-data.dto';

@Injectable({
    providedIn: 'root'
})
export class PaymentEditUseCase implements UseCase<PaymentStoreDto, ResponseIdDataDto> {

    constructor(private PaymentRepository: PaymentRepository) {

    }

    public execute(object: PaymentStoreDto): Observable<ResponseIdDataDto> {
        const that = this;
        let responseIdDataDto: ResponseIdDataDto;
        return that.PaymentRepository.edit(object.id, object).pipe(map(res => {
            responseIdDataDto = res.data;
            return responseIdDataDto;
        }));
    }

}