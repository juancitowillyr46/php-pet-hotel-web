import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { PetRepository } from "../repository/pet.repository";
import { map } from 'rxjs/operators';

@Injectable({
    providedIn: 'root'
})
export class PetAllUseCase implements UseCase<any, any> {

    constructor(private userRepository: PetRepository) {

    }

    public execute(obj: any): Observable<any> {
        const that = this;
        // let accessTokenData: AccessTokenDto = new AccessTokenDto();

        return that.userRepository.getAll(obj).pipe(map(res => {
            console.log(res);
            return res;
            // accessTokenData.token = res.data.token;
            // return accessTokenData;
        }));
    }

}