import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { ServiceRepository } from "../repository/service.repository";
import { map } from 'rxjs/operators';
import { ServiceStoreDto } from '../model/service-store.dto';

@Injectable({
    providedIn: 'root'
})
export class ServiceAddUseCase implements UseCase<UserStoreDto, ResponseIdDataDto> {

    constructor(private petRepository: ServiceRepository) {

    }

    public execute(object: ServiceStoreDto): Observable<ResponseIdDataDto> {
        const that = this;
        let responseIdDataDto: ResponseIdDataDto;
        return that.petRepository.add(object).pipe(map(res => {
            responseIdDataDto = res.data;
            return responseIdDataDto;
        }));
    }

}