import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { ServiceRepository } from "../repository/service.repository";
import { map } from 'rxjs/operators';
import { ServiceStoreDto } from '../model/service-store.dto';
import { ResponseIdDataDto } from '../../../core/entities/response-id-data.dto';

@Injectable({
    providedIn: 'root'
})
export class ServiceAddUseCase implements UseCase<ServiceStoreDto, ResponseIdDataDto> {

    constructor(private serviceRepository: ServiceRepository) {

    }

    public execute(object: ServiceStoreDto): Observable<ResponseIdDataDto> {
        const that = this;
        let responseIdDataDto: ResponseIdDataDto;
        return that.serviceRepository.add(object).pipe(map(res => {
            responseIdDataDto = res.data;
            return responseIdDataDto;
        }));
    }

}