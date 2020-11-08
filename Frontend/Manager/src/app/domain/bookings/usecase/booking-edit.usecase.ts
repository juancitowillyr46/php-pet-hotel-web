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
export class BookingEditUseCase implements UseCase<BookingStoreDto, ResponseIdDataDto> {

    constructor(private customerRepository: BookingRepository) {

    }

    public execute(object: BookingStoreDto): Observable<ResponseIdDataDto> {
        const that = this;
        let responseIdDataDto: ResponseIdDataDto;
        return that.customerRepository.edit(object.id, object).pipe(map(res => {
            responseIdDataDto = res.data;
            return responseIdDataDto;
        }));
    }

}