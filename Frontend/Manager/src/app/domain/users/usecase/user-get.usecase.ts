import { Injectable } from '@angular/core';
import { UseCase } from '../../../core/base/use-case';
import { Observable } from "rxjs";
import { UserRepository } from "../repository/user.repository";
// import { AccessTokenDto } from "../model/access-token.dto"; 
import { map } from 'rxjs/operators';
import { UserDto } from '../model/user.dto';

@Injectable({
    providedIn: 'root'
})
export class UserGetUseCase implements UseCase<string, UserDto> {

    constructor(private userRepository: UserRepository) {

    }

    public execute(id: string): Observable<UserDto> {
        const that = this;
        let userDto: UserDto;
        return that.userRepository.get(id).pipe(map(res => {
            userDto = res.data;
            return userDto;
        }));
    }

}