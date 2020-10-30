import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { DataMasterComponent} from './data-master.component';
import { DataMasterMaintainerComponent } from './data-master-maintainer/data-master-maintainer.component';

const routes: Routes = [
  {
    path: '',
    component: DataMasterComponent,
    children: [
      {
        path: 'maintainer',
        component: DataMasterMaintainerComponent,
        data: {title: 'Data maestra'},
        // resolve
      }
    ]
  },
  
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class DataMasterRoutingModule { }
