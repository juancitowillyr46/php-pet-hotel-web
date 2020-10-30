import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SharedModule } from '../../shared/shared.module';

import { PaymentsComponent } from './payments.component';
import { PaymentsMaintainerComponent } from './payments-maintainer/payments-maintainer.component';
import { PaymentsRoutingModule } from './payments-routing.module';
import { NgbModule, NgbPaginationModule } from '@ng-bootstrap/ng-bootstrap';

@NgModule({
  declarations: [PaymentsComponent, PaymentsMaintainerComponent],
  imports: [
    CommonModule,
    SharedModule,
    PaymentsRoutingModule,
    NgbPaginationModule,
    NgbModule
  ],
  exports: [PaymentsComponent, PaymentsMaintainerComponent],
})
export class PaymentsModule { }
