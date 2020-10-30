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
export class DataMasterEditUseCase implements UseCase<UserStoreDto, ResponseIdDataDto> {

    constructor(private userRepository: PetRepository) {

    }

    public execute(object: PetStoreDto): Observable<ResponseIdDataDto> {
        const that = this;
        let responseIdDataDto: ResponseIdDataDto;
        return that.userRepository.edit(object.id, object).pipe(map(res => {
            responseIdDataDto = res.data;
            return responseIdDataDto;
        }));
    }

}