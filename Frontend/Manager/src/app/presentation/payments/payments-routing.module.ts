import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { PaymentsComponent} from './payments.component';
import { PaymentsMaintainerComponent } from './payments-maintainer/payments-maintainer.component';
import { PaymentsServicesComponent } from './payments-services/payments-services.component';

const routes: Routes = [
  {
    path: '',
    component: PaymentsComponent,
    children: [
      {
        path: 'maintainer',
        component: PaymentsMaintainerComponent,
        data: {title: 'Pago'},
        // resolve
      },
      {
        path: 'payment-services',
        component: PaymentsServicesComponent,
        data: {title: 'Pago'},
        // resolve
      }
    ]
  },
  
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class PaymentsRoutingModule { }
