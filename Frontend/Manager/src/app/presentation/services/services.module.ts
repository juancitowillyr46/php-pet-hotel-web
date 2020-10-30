import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SharedModule } from '../../shared/shared.module';

import { ServicesComponent } from './services.component';
import { ServicesMaintainerComponent } from './services-maintainer/services-maintainer.component';
import { ServicesRoutingModule } from './services-routing.module';
import { NgbModule, NgbPaginationModule } from '@ng-bootstrap/ng-bootstrap';

@NgModule({
  declarations: [ServicesComponent, ServicesMaintainerComponent],
  imports: [
    CommonModule,
    SharedModule,
    ServicesRoutingModule,
    NgbPaginationModule,
    NgbModule
  ],
  exports: [ServicesComponent, ServicesMaintainerComponent],
})
export class ServicesModule { }
