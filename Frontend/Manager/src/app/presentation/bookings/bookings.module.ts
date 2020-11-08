import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { SharedModule } from '../../../app/shared/shared.module';

import { BookingsComponent } from './bookings.component';
import { BookingsMaintainerComponent } from './bookings-maintainer/bookings-maintainer.component';
import { BookingsRoutingModule } from './bookings-routing.module';
import { NgbModule, NgbPaginationModule } from '@ng-bootstrap/ng-bootstrap';

@NgModule({
  declarations: [BookingsComponent,BookingsMaintainerComponent],
  imports: [
    CommonModule,
    SharedModule,
    BookingsRoutingModule,
    NgbPaginationModule,
    NgbModule,
  ],
  exports: [BookingsComponent,BookingsMaintainerComponent]
})
export class BookingsModule { }
