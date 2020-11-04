import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { KennelRepository } from "../repository/kennel.repository";
import { map } from 'rxjs/operators';
import { KennelDto } from '../model/kennel.dto';

@Injectable({
    providedIn: 'root'
})
export class KennelGetUseCase implements UseCase<string, any> {

    constructor(private kennelRepository: KennelRepository) {

    }

    public execute(id: string): Observable<any> {
        const that = this;
        let kennelDto: KennelDto;

        return that.kennelRepository.get(id).pipe(map(res => {
            kennelDto = res.data;
            return kennelDto;
        }));
    }

}