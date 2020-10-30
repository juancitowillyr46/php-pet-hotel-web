import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { PetRepository } from "../repository/pet.repository";
import { map } from 'rxjs/operators';
import { PetStoreDto } from '../model/pet-store.dto';

@Injectable({
    providedIn: 'root'
})
export class PetAddUseCase implements UseCase<UserStoreDto, ResponseIdDataDto> {

    constructor(private petRepository: PetRepository) {

    }

    public execute(object: PetStoreDto): Observable<ResponseIdDataDto> {
        const that = this;
        let responseIdDataDto: ResponseIdDataDto;
        return that.petRepository.add(object).pipe(map(res => {
            responseIdDataDto = res.data;
            return responseIdDataDto;
        }));
    }

}