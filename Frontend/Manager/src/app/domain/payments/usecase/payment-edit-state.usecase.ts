import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { PaymentRepository } from "../repository/payment.repository";
import { map } from 'rxjs/operators';
import { PaymentStoreDto } from '../model/payment-store.dto';
import { ResponseIdDataDto } from '../../../core/entities/response-id-data.dto';
import { PaymentStateStoreDto } from '../model/payment-store-state.dto';

@Injectable({
    providedIn: 'root'
})
export class PaymentEditStateUseCase implements UseCase<PaymentStateStoreDto, ResponseIdDataDto> {

    constructor(private PaymentRepository: PaymentRepository) {

    }

    public execute(object: PaymentStateStoreDto): Observable<ResponseIdDataDto> {
        const that = this;
        let responseIdDataDto: ResponseIdDataDto;
        return that.PaymentRepository.editState(object.id, object).pipe(map(res => {
            responseIdDataDto = res.data;
            return responseIdDataDto;
        }));
    }

}