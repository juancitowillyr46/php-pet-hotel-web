import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SharedModule } from '../../shared/shared.module';

import { KennelsComponent } from './kennels.component';
import { KennelsMaintainerComponent } from './kennels-maintainer/kennels-maintainer.component';
import { KennelsRoutingModule } from './kennels-routing.module';
import { NgbModule, NgbPaginationModule } from '@ng-bootstrap/ng-bootstrap';

@NgModule({
  declarations: [KennelsComponent, KennelsMaintainerComponent],
  imports: [
    CommonModule,
    SharedModule,
    KennelsRoutingModule,
    NgbPaginationModule,
    NgbModule
  ],
  exports: [KennelsComponent, KennelsMaintainerComponent],
})
export class KennelsModule { }
