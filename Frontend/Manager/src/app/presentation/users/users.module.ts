import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SharedModule } from '../../../app/shared/shared.module';

import { UsersComponent } from './users.component';
import { UsersMaintainerComponent } from './users-maintainer/users-maintainer.component';
import { UsersRoutingModule } from './users-routing.module';
import { RolesMaintainerComponent } from './roles-maintainer/roles-maintainer.component';
import { NgbModule, NgbPaginationModule } from '@ng-bootstrap/ng-bootstrap';



@NgModule({
  declarations: [UsersComponent, UsersMaintainerComponent, RolesMaintainerComponent],
  imports: [
    CommonModule,
    SharedModule,
    UsersRoutingModule,
    NgbPaginationModule,
    NgbModule,
  ],
  exports: [UsersComponent, UsersMaintainerComponent, RolesMaintainerComponent],
})
export class UsersModule { }
