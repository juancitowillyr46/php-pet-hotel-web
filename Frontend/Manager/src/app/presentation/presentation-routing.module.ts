import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { PresentationComponent } from './presentation.component';

const routes: Routes = [
  {
    path: 'modules',
    component: PresentationComponent,
    children: [
      {
        path: 'users',
        loadChildren: () => import('./users/users.module')
        .then(m => m.UsersModule)
        // resolve
      },
      {
        path: 'customers',
        loadChildren: () => import('./customers/customers.module')
        .then(m => m.CustomersModule)
        // resolve
      },
      {
        path: 'pets',
        loadChildren: () => import('./pets/pets.module')
        .then(m => m.PetsModule)
        // resolve
      },
      {
        path: 'services',
        loadChildren: () => import('./services/services.module')
        .then(m => m.ServicesModule)
        // resolve
      },
      {
        path: 'payments',
        loadChildren: () => import('./payments/payments.module')
        .then(m => m.PaymentsModule)
        // resolve
      },
      {
        path: 'kennels',
        loadChildren: () => import('./kennels/kennels.module')
        .then(m => m.KennelsModule)
        // resolve
      },
      {
        path: 'datamaster',
        loadChildren: () => import('./datamaster/data-master.module')
        .then(m => m.DataMasterModule)
        // resolve
      }
    ]
  },
  
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class PresentationRoutingModule { }
