import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { SharedModule } from '../../../app/shared/shared.module';

import { BookingsComponent } from './bookings.component';
import { BookingsMaintainerComponent } from './bookings-maintainer/bookings-maintainer.component';
import { BookingsRoutingModule } from './bookings-routing.module';
import { NgbModule, NgbPaginationModule } from '@ng-bootstrap/ng-bootstrap';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

@NgModule({
  declarations: [BookingsComponent,BookingsMaintainerComponent],
  imports: [
    CommonModule,
    SharedModule,
    BookingsRoutingModule,
    NgbPaginationModule,
    NgbModule,
    NgbPaginationModule,
    NgbModule,
    ReactiveFormsModule,
    FormsModule,
  ],
  exports: [BookingsComponent,BookingsMaintainerComponent]
})
export class BookingsModule { }
