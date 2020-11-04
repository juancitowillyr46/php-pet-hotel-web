import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { KennelRepository } from "../repository/kennel.repository";
import { map } from 'rxjs/operators';
import { KennelStoreDto } from '../model/kennel-store.dto';
import { ResponseIdDataDto } from '../../../core/entities/response-id-data.dto';

@Injectable({
    providedIn: 'root'
})
export class KennelAddUseCase implements UseCase<KennelStoreDto, ResponseIdDataDto> {

    constructor(private kennelRepository: KennelRepository) {

    }

    public execute(object: KennelStoreDto): Observable<ResponseIdDataDto> {
        const that = this;
        let responseIdDataDto: ResponseIdDataDto;
        return that.kennelRepository.add(object).pipe(map(res => {
            responseIdDataDto = res.data;
            return responseIdDataDto;
        }));
    }

}