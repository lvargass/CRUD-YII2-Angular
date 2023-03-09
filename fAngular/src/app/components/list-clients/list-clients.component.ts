import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { IClient } from 'src/app/interfaces/i-client';
import { GeneralService } from 'src/app/services/general.service';

@Component({
  selector: 'app-list-clients',
  templateUrl: './list-clients.component.html',
  styleUrls: ['./list-clients.component.scss']
})
export class ListClientsComponent implements OnInit {

  listClients: IClient[] = [];

  constructor(private gService: GeneralService, private router: Router) { }

  ngOnInit(): void {
    console.log('Inicializado');
    this.viewClients();
  }

  /**
   * viewClients 
   */
  async viewClients() {
    try {
      const result = await this.gService.executeRequest();
      // Asignando la lista de clientes
      console.log(result)
      this.listClients = result.data;
    } catch (error) {
      console.log('error: ', error);
    }
  }

  /**
   * onCreateClient
   */
  public onCreateClient() {
    this.router.navigateByUrl('/client/create');
  }

  /**
   * onDeleteClient
   */
  public async onDeleteClient(id: string) {
    try {
      // Confirmacion para eliminar el registro
      const isDelete = confirm(`Estas seguro de querer eliminar el cliente de id: ${id}`);
      if (isDelete) {
        const resultC = await this.gService.executeRequestDelete(`client/delete?id=${id}`);
        const resultP = await this.gService.executeRequestDelete(`perfil/delete?id=${id}`);
        const resultA = await this.gService.executeRequestDelete(`address/delete?id=${id}`);

        if (resultC.status == 200 && resultC.data.error == false) {
          console.log(resultA, resultP)
          // Aqui va el codigo para crear al nuevo cliente
          // Aqui va el codigo para crear al nuevo cliente
          alert('El cliente se ha eliminado correctamente.');
          this.viewClients();
          return;
        }
        // Hubo un error creando al cliente
        alert('Ocurrio un error creando al cliente.')
      }
    } catch (error) {
      console.log('error: ', error);
    }
  }

}
