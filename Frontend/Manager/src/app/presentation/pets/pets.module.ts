import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SharedModule } from '../../shared/shared.module';

import { PetsComponent } from './pets.component';
import { PetsMaintainerComponent } from './pets-maintainer/pets-maintainer.component';
import { PetsRoutingModule } from './pets-routing.module';
import { NgbModule, NgbPaginationModule } from '@ng-bootstrap/ng-bootstrap';

@NgModule({
  declarations: [PetsComponent, PetsMaintainerComponent],
  imports: [
    CommonModule,
    SharedModule,
    PetsRoutingModule,
    NgbPaginationModule,
    NgbModule
  ],
  exports: [PetsComponent, PetsMaintainerComponent],
})
export class PetsModule { }
