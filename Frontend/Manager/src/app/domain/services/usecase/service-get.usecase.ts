import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { ServiceRepository } from "../repository/service.repository";
// import { AccessTokenDto } from "../model/access-token.dto"; 
import { map } from 'rxjs/operators';
import { ServiceDto } from '../model/service.dto';

@Injectable({
    providedIn: 'root'
})
export class ServiceGetUseCase implements UseCase<string, any> {

    constructor(private serviceRepository: ServiceRepository) {

    }

    public execute(id: string): Observable<any> {
        const that = this;
        let userDto: ServiceDto;

        return that.serviceRepository.get(id).pipe(map(res => {
            userDto = res.data;
            return userDto;
        }));
    }

}