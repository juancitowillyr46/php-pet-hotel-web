import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { UserRepository } from "../repository/user.repository";
import { map } from 'rxjs/operators';
import { UserPasswordStoreDto, UserStoreDto } from '../model/user-store.dto';
import { ResponseIdDataDto } from '../../../../app/core/entities/response-id-data.dto';

@Injectable({
    providedIn: 'root'
})
export class UserEditPasswordUseCase implements UseCase<UserPasswordStoreDto, ResponseIdDataDto> {

    constructor(private userRepository: UserRepository) {

    }

    public execute(object: UserPasswordStoreDto): Observable<ResponseIdDataDto> {
        const that = this;
        let responseIdDataDto: ResponseIdDataDto;
        return that.userRepository.editPassword(object.id, object).pipe(map(res => {
            responseIdDataDto = res.data;
            return responseIdDataDto;
        }));
    }

}