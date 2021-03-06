import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { KennelRepository } from "../repository/kennel.repository";
import { map } from 'rxjs/operators';

@Injectable({
    providedIn: 'root'
})
export class KennelAllUseCase implements UseCase<any, any> {

    constructor(private kennelRepository: KennelRepository) {

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