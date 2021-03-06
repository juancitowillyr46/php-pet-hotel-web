import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { CustomerRepository } from "../repository/customer.repository";
import { map } from 'rxjs/operators';

@Injectable({
    providedIn: 'root'
})
export class CustomerAllUseCase implements UseCase<any, any> {

    constructor(private customerRepository: CustomerRepository) {

    }

    public execute(obj: any): Observable<any> {
        const that = this;
        //let accessTokenData: AccessTokenDto = new AccessTokenDto();

        return that.customerRepository.getAll(obj).pipe(map(res => {
            console.log(res);
            return res;
            // accessTokenData.token = res.data.token;
            // return accessTokenData;
        }));
    }

}