import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ListClientsComponent } from './components/list-clients/list-clients.component';
import { CreateClientComponent } from './components/create-client/create-client.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { EditClientComponent } from './components/edit-client/edit-client.component';

@NgModule({
  declarations: [
    AppComponent,
    ListClientsComponent,
    CreateClientComponent,
    EditClientComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,

    
    FormsModule,
    ReactiveFormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
