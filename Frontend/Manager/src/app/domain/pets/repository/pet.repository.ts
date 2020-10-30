import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { DataService } from "../../../core/base/data.service";
import { ResponseDataDto } from '../../../core/base/response-data.dto';
import { ResponseIdDataDto } from '../../../core/entities/response-id-data.dto';
import { PetDto } from '../model/pet.dto';
import { PetStoreDto } from '../model/pet-store.dto';

@Injectable({
    providedIn: 'root'
})
export class PetRepository {

    private resource = 'pets';

    constructor(private dataService: DataService){

    }

    getAll(obj: any): Observable<ResponseDataDto<PetDto[]>> {
        const that = this;
        return that.dataService.get(that.resource + '?size='+ obj.size  +'&page=' + obj.page);
    }
    
    // get(id: string): Observable<ResponseDataDto<UserDto>> {
    //     const that = this;
    //     return that.dataService.get(that.resource, id);
    // }

    // edit(id: string, object: PetStoreDto): Observable<ResponseDataDto<ResponseIdDataDto>> {
    //     const that = this;
    //     return that.dataService.put(that.resource, id, object);
    // }

    // add(object: PetStoreDto): Observable<ResponseDataDto<ResponseIdDataDto>> {
    //     const that = this;
    //     return that.dataService.post(that.resource, object);
    // }

    // remove(id: string): Observable<ResponseDataDto<ResponseIdDataDto>> { 
    //     const that = this;
    //     return that.dataService.delete(that.resource, id);
    // }

    

}