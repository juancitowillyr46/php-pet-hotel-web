import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { SharedModule } from '../shared/shared.module';

import { PresentationComponent } from './presentation.component';
import { PresentationRoutingModule } from './../presentation/presentation-routing.module';

import { CustomersModule } from './customers/customers.module';
import { UsersModule } from '../presentation/users/users.module';
import { PetsModule } from '../presentation/pets/pets.module';
import { ServicesModule } from '../presentation/services/services.module';
import { DataMasterModule } from '../presentation/datamaster/data-master.module';

@NgModule({
  declarations: [PresentationComponent],
  imports: [
    SharedModule,
    PresentationRoutingModule,
    CommonModule,

    // Modules
    CustomersModule,
    UsersModule,
    PetsModule,
    ServicesModule,
    DataMasterModule
  ]
})
export class PresentationModule { }
