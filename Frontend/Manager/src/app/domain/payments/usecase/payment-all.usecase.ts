import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { PaymentRepository } from "../repository/payment.repository";
import { map } from 'rxjs/operators';

@Injectable({
    providedIn: 'root'
})
export class PaymentAllUseCase implements UseCase<any, any> {

    constructor(private PaymentRepository: PaymentRepository) {

    }

    public execute(obj: any): Observable<any> {
        const that = this;
        //let accessTokenData: AccessTokenDto = new AccessTokenDto();
        
        return that.PaymentRepository.getAllFilters(obj).pipe(map(res => {
            console.log(res);
            return res;
            // accessTokenData.token = res.data.token;
            // return accessTokenData;
        }));
    }

}