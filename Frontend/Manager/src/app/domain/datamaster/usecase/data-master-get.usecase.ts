import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { PetRepository } from "../repository/pet.repository";
// import { AccessTokenDto } from "../model/access-token.dto"; 
import { map } from 'rxjs/operators';
import { PetDto } from '../model/pet.dto';

@Injectable({
    providedIn: 'root'
})
export class DataMasterGetUseCase implements UseCase<string, any> {

    constructor(private userRepository: PetRepository) {

    }

    public execute(id: string): Observable<any> {
        const that = this;
        let userDto: PetDto;

        return that.userRepository.get(id).pipe(map(res => {
            userDto = res.data;
            return userDto;
        }));
    }

}