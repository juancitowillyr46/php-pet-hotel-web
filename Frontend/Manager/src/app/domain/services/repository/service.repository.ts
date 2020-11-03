import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { DataService } from "../../../core/base/data.service";
import { ResponseDataDto } from '../../../core/base/response-data.dto';
import { ResponseIdDataDto } from '../../../core/entities/response-id-data.dto';
import { ServiceDto } from '../model/service.dto';
import { ServiceStoreDto } from '../model/service-store.dto';

@Injectable({
    providedIn: 'root'
})
export class ServiceRepository {

    private resource = 'services';

    constructor(private dataService: DataService){

    }

    getAll(obj: any): Observable<ResponseDataDto<ServiceDto[]>> {
        const that = this;
        return that.dataService.get(that.resource + '?size='+ obj.size  +'&page=' + obj.page);
    }
    
    get(id: string): Observable<ResponseDataDto<ServiceDto>> {
        const that = this;
        return that.dataService.get(that.resource, id);
    }

    // edit(id: string, object: ServiceStoreDto): Observable<ResponseDataDto<ResponseIdDataDto>> {
    //     const that = this;
    //     return that.dataService.put(that.resource, id, object);
    // }

    add(object: ServiceStoreDto): Observable<ResponseDataDto<ResponseIdDataDto>> {
        const that = this;
        return that.dataService.post(that.resource, object);
    }

    // remove(id: string): Observable<ResponseDataDto<ResponseIdDataDto>> { 
    //     const that = this;
    //     return that.dataService.delete(that.resource, id);
    // }

    

}