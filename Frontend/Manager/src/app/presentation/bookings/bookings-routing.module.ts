import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { BookingsMaintainerComponent } from '../bookings/bookings-maintainer/bookings-maintainer.component';
import { BookingsComponent } from '../bookings/bookings.component';

const routes: Routes = [
  {
    path: '',
    component: BookingsComponent,
    children: [
      {
        path: 'maintainer',
        component: BookingsMaintainerComponent,
        data: {title: 'Reservas'},
        // resolve
      }
    ]
  },
  
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class BookingsRoutingModule { }
