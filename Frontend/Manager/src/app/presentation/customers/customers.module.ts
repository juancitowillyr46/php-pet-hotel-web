import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { SharedModule } from '../../../app/shared/shared.module';

import { CustomersComponent } from './customers.component';
import { CustomersMaintainerComponent } from './customers-maintainer/customers-maintainer.component';
import { CustomersRoutingModule } from './customers-routing.module';
import { NgbModule, NgbPaginationModule } from '@ng-bootstrap/ng-bootstrap';

@NgModule({
  declarations: [CustomersComponent,CustomersMaintainerComponent],
  imports: [
    CommonModule,
    SharedModule,
    CustomersRoutingModule,
    NgbPaginationModule,
    NgbModule,
  ],
  exports: [CustomersComponent,CustomersMaintainerComponent]
})
export class CustomersModule { }
