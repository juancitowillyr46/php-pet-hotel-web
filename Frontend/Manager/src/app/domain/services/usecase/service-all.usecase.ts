import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { ServiceRepository } from "../repository/service.repository";
import { map } from 'rxjs/operators';

@Injectable({
    providedIn: 'root'
})
export class ServiceAllUseCase implements UseCase<any, any> {

    constructor(private serviceRepository: ServiceRepository) {

    }

    public execute(obj: any): Observable<any> {
        const that = this;
        // let accessTokenData: AccessTokenDto = new AccessTokenDto();

        return that.serviceRepository.getAll(obj).pipe(map(res => {
            console.log(res);
            return res;
            // accessTokenData.token = res.data.token;
            // return accessTokenData;
        }));
    }

}