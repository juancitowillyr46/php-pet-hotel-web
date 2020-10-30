import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SharedModule } from '../../shared/shared.module';

import { DataMasterComponent } from './data-master.component';
import { DataMasterMaintainerComponent } from './data-master-maintainer/data-master-maintainer.component';
import { DataMasterRoutingModule } from './data-master-routing.module';
import { NgbModule, NgbPaginationModule } from '@ng-bootstrap/ng-bootstrap';

@NgModule({
  declarations: [DataMasterComponent, DataMasterMaintainerComponent],
  imports: [
    CommonModule,
    SharedModule,
    DataMasterRoutingModule,
    NgbPaginationModule,
    NgbModule
  ],
  exports: [DataMasterComponent, DataMasterMaintainerComponent],
})
export class DataMasterModule { }
