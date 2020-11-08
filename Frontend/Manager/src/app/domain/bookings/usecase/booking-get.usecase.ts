import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { BookingRepository } from "../repository/booking.repository";
import { map } from 'rxjs/operators';
import { BookingDto } from '../model/booking.dto';

@Injectable({
    providedIn: 'root'
})
export class BookingGetUseCase implements UseCase<string, any> {

    constructor(private customerRepository: BookingRepository) {

    }

    public execute(id: string): Observable<BookingDto> {
        const that = this;
        let ProductDto: BookingDto;

        return that.customerRepository.get(id).pipe(map(res => {
            ProductDto = res.data;
            return ProductDto;
        }));
    }

}