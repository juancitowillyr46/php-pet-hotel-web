import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { DataService } from "../../../core/base/data.service";
import { ResponseDataDto } from '../../../core/base/response-data.dto';
import { ResponseIdDataDto } from '../../../core/entities/response-id-data.dto';
import { PaymentDto } from '../model/payment.dto';
import { PaymentStoreDto } from '../model/payment-store.dto';
import { PaymentStateStoreDto } from '../model/payment-store-state.dto';

@Injectable({
    providedIn: 'root'
})
export class PaymentRepository {

    private resource = 'payments';

    constructor(private dataService: DataService){

    }

    getAll(obj: any): Observable<ResponseDataDto<PaymentDto[]>> {
        const that = this;
        return that.dataService.get(that.resource + '?size='+ obj.size  +'&page=' + obj.page + '&usingPaginate=1');
    }
    
    getAllFilters(obj: any): Observable<ResponseDataDto<PaymentDto[]>> {
        const that = this;
        return that.dataService.get(that.resource + '?size='+ obj.size  +'&page=' + obj.page + '&usingPaginate=1' + '&dateFrom=' + obj.dateFrom + '&dateTo=' + obj.dateTo + '&stateId=' + obj.stateId);
    }

    get(id: string): Observable<ResponseDataDto<PaymentDto>> {
        const that = this;
        return that.dataService.get(that.resource, id);
    }

    edit(id: string, object: PaymentStoreDto): Observable<ResponseDataDto<ResponseIdDataDto>> {
        const that = this;
        return that.dataService.put(that.resource, id, object);
    }

    editState(id: string, object: PaymentStateStoreDto): Observable<ResponseDataDto<ResponseIdDataDto>> {
        const that = this;
        return that.dataService.put(that.resource, id + '/update-state', object);
    }

    add(object: PaymentStoreDto): Observable<ResponseDataDto<ResponseIdDataDto>> {
        const that = this;
        return that.dataService.post(that.resource, object);
    }

    remove(id: string): Observable<ResponseDataDto<ResponseIdDataDto>> { 
        const that = this;
        return that.dataService.delete(that.resource, id);
    }

}