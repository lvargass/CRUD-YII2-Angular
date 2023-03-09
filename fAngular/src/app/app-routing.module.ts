import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { CreateClientComponent } from './components/create-client/create-client.component';
import { EditClientComponent } from './components/edit-client/edit-client.component';
import { ListClientsComponent } from './components/list-clients/list-clients.component';

const routes: Routes = [
  { path: '', component: ListClientsComponent },
  { path: 'client/', component: ListClientsComponent },
  { path: 'client/create', component: CreateClientComponent },
  { path: 'client/edit/:id', component: EditClientComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
