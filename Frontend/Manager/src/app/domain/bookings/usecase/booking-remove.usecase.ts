import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { BookingRepository } from "../repository/booking.repository";
import { map } from 'rxjs/operators';
import { BookingStoreDto } from '../model/booking-store.dto';
import { ResponseIdDataDto } from '../../../core/entities/response-id-data.dto';

@Injectable({
    providedIn: 'root'
})
export class BookingRemoveUseCase implements UseCase<string, ResponseIdDataDto> {

    constructor(private customerRepository: BookingRepository) {

    }

    public execute(id: string): Observable<ResponseIdDataDto> {
        const that = this;
        console.log(id);
        let responseIdDataDto: ResponseIdDataDto;
        return that.customerRepository.remove(id).pipe(map(res => {
            responseIdDataDto = res.data;
            return responseIdDataDto;
        }));
    }

}