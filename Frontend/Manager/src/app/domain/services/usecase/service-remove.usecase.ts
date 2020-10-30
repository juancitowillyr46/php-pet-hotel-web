import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { ServiceRepository } from "../repository/service.repository";
// import { AccessTokenDto } from "../model/access-token.dto"; 
import { map } from 'rxjs/operators';
// import { ServiceDto } from '../model/service.dto';
import { ServiceStoreDto } from '../model/user-store.dto';
import { ResponseIdDataDto } from 'src/app/core/entities/response-id-data.dto';

@Injectable({
    providedIn: 'root'
})
export class ServiceRemoveUseCase implements UseCase<string, ResponseIdDataDto> {

    constructor(private serviceRepository: ServiceRepository) {

    }

    public execute(id: string): Observable<ResponseIdDataDto> {
        const that = this;
        console.log(id);
        let responseIdDataDto: ResponseIdDataDto;
        return that.serviceRepository.remove(id).pipe(map(res => {
            responseIdDataDto = res.data;
            return responseIdDataDto;
        }));
    }

}