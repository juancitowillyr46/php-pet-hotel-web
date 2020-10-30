import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { KennelsComponent} from './kennels.component';
import { KennelsMaintainerComponent} from './kennels-maintainer/kennels-maintainer.component';

const routes: Routes = [
  {
    path: '',
    component: KennelsComponent,
    children: [
      {
        path: 'maintainer',
        component: KennelsMaintainerComponent,
        data: {title: 'Caniles'},
        // resolve
      }
    ]
  },
  
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class KennelsRoutingModule { }
