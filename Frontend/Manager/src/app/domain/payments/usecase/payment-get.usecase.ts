import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { PaymentRepository } from "../repository/payment.repository";
import { map } from 'rxjs/operators';
import { PaymentDto } from '../model/payment.dto';

@Injectable({
    providedIn: 'root'
})
export class PaymentGetUseCase implements UseCase<string, any> {

    constructor(private PaymentRepository: PaymentRepository) {

    }

    public execute(id: string): Observable<PaymentDto> {
        const that = this;
        let ProductDto: PaymentDto;

        return that.PaymentRepository.get(id).pipe(map(res => {
            ProductDto = res.data;
            return ProductDto;
        }));
    }

}