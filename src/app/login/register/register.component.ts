import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { LogiServiceService} from './logi-service.service';
import { register } from './register'
  
@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css'],
  providers:[LogiServiceService]
})
export class RegisterComponent implements OnInit {

  constructor(
    private router:Router
  ) { }

  ngOnInit() {
  }

   onLogin(usnm:string,pass:string){

    // console.log(usnm,pass)
    this.router.navigate(['dash'])
  }

}
