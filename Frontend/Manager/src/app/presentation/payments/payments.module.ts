import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SharedModule } from '../../shared/shared.module';

import { PaymentsComponent } from './payments.component';
import { PaymentsMaintainerComponent } from './payments-maintainer/payments-maintainer.component';
import { PaymentsRoutingModule } from './payments-routing.module';
import { NgbModule, NgbPaginationModule } from '@ng-bootstrap/ng-bootstrap';
import { PaymentsServicesComponent } from './payments-services/payments-services.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

@NgModule({
  declarations: [PaymentsComponent, PaymentsMaintainerComponent, PaymentsServicesComponent],
  imports: [
    CommonModule,
    SharedModule,
    PaymentsRoutingModule,
    NgbPaginationModule,
    NgbModule,
    ReactiveFormsModule,
    FormsModule,
  ],
  exports: [PaymentsComponent, PaymentsMaintainerComponent],
})
export class PaymentsModule { }
