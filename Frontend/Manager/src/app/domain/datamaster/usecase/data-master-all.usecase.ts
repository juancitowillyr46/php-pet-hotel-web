import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { DataMasterRepository } from "../repository/data-master.repository";
import { map } from 'rxjs/operators';

@Injectable({
    providedIn: 'root'
})
export class DataMasterAllUseCase implements UseCase<any, any> {

    constructor(private kennelRepository: DataMasterRepository) {

    }

    public execute(obj: any): Observable<any> {
        const that = this;
        // let accessTokenData: AccessTokenDto = new AccessTokenDto();

        return that.kennelRepository.getAll(obj).pipe(map(res => {
            console.log(res);
            return res;
            // accessTokenData.token = res.data.token;
            // return accessTokenData;
        }));
    }

}