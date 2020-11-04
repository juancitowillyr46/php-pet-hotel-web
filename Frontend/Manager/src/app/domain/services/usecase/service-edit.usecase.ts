import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { ServiceRepository } from "../repository/service.repository";
// import { AccessTokenDto } from "../model/access-token.dto"; 
import { map } from 'rxjs/operators';
// import { ServiceDto } from '../model/service.dto';
import { ServiceStoreDto } from '../model/service-store.dto';
import { ResponseIdDataDto } from '../../../../app/core/entities/response-id-data.dto';

@Injectable({
    providedIn: 'root'
})
export class ServiceEditUseCase implements UseCase<ServiceStoreDto, ResponseIdDataDto> {

    constructor(private serviceRepository: ServiceRepository) {

    }

    public execute(object: ServiceStoreDto): Observable<ResponseIdDataDto> {
        const that = this;
        let responseIdDataDto: ResponseIdDataDto;
        return that.serviceRepository.edit(object.id, object).pipe(map(res => {
            responseIdDataDto = res.data;
            return responseIdDataDto;
        }));
    }

}