import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { DataService } from "../../../core/base/data.service";
import { ResponseDataDto } from '../../../core/base/response-data.dto';
import { ResponseIdDataDto } from '../../../core/entities/response-id-data.dto';
import { KennelDto } from '../model/kennel.dto';
import { KennelStoreDto } from '../model/kennel-store.dto';

@Injectable({
    providedIn: 'root'
})
export class KennelRepository {

    private resource = 'kennels';

    constructor(private dataService: DataService){

    }

    getAll(obj: any): Observable<ResponseDataDto<KennelDto[]>> {
        const that = this;
        return that.dataService.get(that.resource + '?size='+ obj.size  +'&page=' + obj.page);
    }
    
    get(id: string): Observable<ResponseDataDto<KennelDto>> {
        const that = this;
        return that.dataService.get(that.resource, id);
    }

    edit(id: string, object: KennelStoreDto): Observable<ResponseDataDto<ResponseIdDataDto>> {
        const that = this;
        return that.dataService.put(that.resource, id, object);
    }

    add(object: KennelStoreDto): Observable<ResponseDataDto<ResponseIdDataDto>> {
        const that = this;
        return that.dataService.post(that.resource, object);
    }

    remove(id: string): Observable<ResponseDataDto<ResponseIdDataDto>> { 
        const that = this;
        return that.dataService.delete(that.resource, id);
    }

    

}