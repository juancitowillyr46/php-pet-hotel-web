import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { KennelRepository } from "../repository/kennel.repository";
// import { AccessTokenDto } from "../model/access-token.dto"; 
import { map } from 'rxjs/operators';
// import { PetDto } from '../model/pet.dto';
import { KennelStoreDto } from '../model/kennel-store.dto';
import { ResponseIdDataDto } from '../../../../app/core/entities/response-id-data.dto';

@Injectable({
    providedIn: 'root'
})
export class KennelRemoveUseCase implements UseCase<string, ResponseIdDataDto> {

    constructor(private kennelRepository: KennelRepository) {

    }

    public execute(id: string): Observable<ResponseIdDataDto> {
        const that = this;
        console.log(id);
        let responseIdDataDto: ResponseIdDataDto;
        return that.kennelRepository.remove(id).pipe(map(res => {
            responseIdDataDto = res.data;
            return responseIdDataDto;
        }));
    }

}