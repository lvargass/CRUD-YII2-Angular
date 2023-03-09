import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { GeneralService } from 'src/app/services/general.service';

@Component({
  selector: 'app-create-client',
  templateUrl: './create-client.component.html',
  styleUrls: ['./create-client.component.scss']
})
export class CreateClientComponent implements OnInit {

  clientForm: FormGroup;

  constructor(private router: Router, private formBuilder: FormBuilder, private gService: GeneralService) {
    this.clientForm = this.formBuilder.group({
      first_name: ['', Validators.required],
      last_name: ['', Validators.required],
      phone: ['', Validators.required],
      username: ['', Validators.required],
      password: ['', Validators.required],
      zipcode: ['', Validators.required],
      address: ['', Validators.required],
      country: 'Republica Dominicana',
      city: ['', Validators.required],
      state: ['', Validators.required]
    });
  }

  ngOnInit(): void {
  }

  /**
   * obSubmit
   */
  async onSubmit(clientData: any) {
    try {
      if (this.clientForm.valid) {
        const resultC = await this.gService.executeRequestPost(clientData, 'client/create');
        // const resultA = await this.gService.executeRequestPost(clientData, 'address/create');
        console.log('resultC, ', resultC)
        if (resultC.status == 200 && resultC.data.error == false) {
          // Creando el perfil 2da request 
          const resultP = await this.gService.executeRequestPost(clientData, 'perfil/create?id=' + resultC.data.content.id);
          const resultA = await this.gService.executeRequestPost(clientData, 'address/create?id=' + resultC.data.content.id);
          console.log(resultA, resultP)
          // Aqui va el codigo para crear al nuevo cliente
          if (resultP.data.error == false && resultA.data.error == false) {
            alert('El cliente se ha creado correctamente.');
            this.router.navigateByUrl('/');
            return
          }
          alert('Ocurrio un error creando el perfil');
          return;
        }
        // Hubo un error creando al cliente
        alert('Ocurrio un error creando al cliente.')
        return;
      }
      // Formulario invalido
      alert('Debe completar todos los cambos del formulario.');
    } catch (error) {
      console.log('error: ', error);
    }
  }

  /**
   * onGoBack
   */
  onGoBack() {
    this.router.navigateByUrl('/');
  }

}
