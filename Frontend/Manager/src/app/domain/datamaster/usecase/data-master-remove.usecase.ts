import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { PetRepository } from "../repository/pet.repository";
// import { AccessTokenDto } from "../model/access-token.dto"; 
import { map } from 'rxjs/operators';
// import { PetDto } from '../model/pet.dto';
import { PetStoreDto } from '../model/user-store.dto';
import { ResponseIdDataDto } from 'src/app/core/entities/response-id-data.dto';

@Injectable({
    providedIn: 'root'
})
export class DataMasterRemoveUseCase implements UseCase<string, ResponseIdDataDto> {

    constructor(private userRepository: PetRepository) {

    }

    public execute(id: string): Observable<ResponseIdDataDto> {
        const that = this;
        console.log(id);
        let responseIdDataDto: ResponseIdDataDto;
        return that.userRepository.remove(id).pipe(map(res => {
            responseIdDataDto = res.data;
            return responseIdDataDto;
        }));
    }

}