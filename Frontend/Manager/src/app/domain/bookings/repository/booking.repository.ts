import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { DataService } from "../../../core/base/data.service";
import { ResponseDataDto } from '../../../core/base/response-data.dto';
import { ResponseIdDataDto } from '../../../core/entities/response-id-data.dto';
import { BookingDto } from '../model/booking.dto';
import { BookingStoreDto } from '../model/booking-store.dto';

@Injectable({
    providedIn: 'root'
})
export class BookingRepository {

    private resource = 'bookings';

    constructor(private dataService: DataService){

    }

    getAll(obj: any): Observable<ResponseDataDto<BookingDto[]>> {
        const that = this;
        return that.dataService.get(that.resource + '?size='+ obj.size  +'&page=' + obj.page + '&usingPaginate=1');
    }
    
    get(id: string): Observable<ResponseDataDto<BookingDto>> {
        const that = this;
        return that.dataService.get(that.resource, id);
    }

    edit(id: string, object: BookingStoreDto): Observable<ResponseDataDto<ResponseIdDataDto>> {
        const that = this;
        return that.dataService.put(that.resource, id, object);
    }

    editState(id: string, object: BookingStoreDto): Observable<ResponseDataDto<ResponseIdDataDto>> {
        const that = this;
        return that.dataService.put(that.resource, id + '/update-state', object);
    }

    add(object: BookingStoreDto): Observable<ResponseDataDto<ResponseIdDataDto>> {
        const that = this;
        return that.dataService.post(that.resource, object);
    }

    remove(id: string): Observable<ResponseDataDto<ResponseIdDataDto>> { 
        const that = this;
        return that.dataService.delete(that.resource, id);
    }

}