import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { PetsComponent} from './pets.component';
import { PetsMaintainerComponent} from './pets-maintainer/pets-maintainer.component';

const routes: Routes = [
  {
    path: '',
    component: PetsComponent,
    children: [
      {
        path: 'maintainer',
        component: PetsMaintainerComponent,
        data: {title: 'Perros'},
        // resolve
      }
    ]
  },
  
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class PetsRoutingModule { }
