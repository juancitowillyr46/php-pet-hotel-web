import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { DataService } from "../../../core/base/data.service";
import { ResponseDataDto } from '../../../core/base/response-data.dto';
import { ResponseIdDataDto } from '../../../core/entities/response-id-data.dto';
import { UserDto } from '../model/user.dto';
import { UserPasswordStoreDto, UserStoreDto } from '../model/user-store.dto';

@Injectable({
    providedIn: 'root'
})
export class UserRepository {

    private resource = 'users';

    constructor(private dataService: DataService){

    }

    getAll(obj: any): Observable<ResponseDataDto<UserDto[]>> {
        const that = this;
        return that.dataService.get(that.resource + '?size='+ obj.size  +'&page=' + obj.page);
    }
    
    get(id: string): Observable<ResponseDataDto<UserDto>> {
        const that = this;
        return that.dataService.get(that.resource, id);
    }

    edit(id: string, object: UserStoreDto): Observable<ResponseDataDto<ResponseIdDataDto>> {
        const that = this;
        return that.dataService.put(that.resource, id, object);
    }

    
    editPassword(id: string, object: UserPasswordStoreDto): Observable<ResponseDataDto<ResponseIdDataDto>> {
        const that = this;
        return that.dataService.put(that.resource, id + '/change-password', object);
    }

    add(object: UserStoreDto): Observable<ResponseDataDto<ResponseIdDataDto>> {
        const that = this;
        return that.dataService.post(that.resource, object);
    }

    remove(id: string): Observable<ResponseDataDto<ResponseIdDataDto>> { 
        const that = this;
        return that.dataService.delete(that.resource, id);
    }

    

}