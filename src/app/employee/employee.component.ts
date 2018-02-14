import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-employee',
  templateUrl: './employee.component.html',
  styleUrls: ['./employee.component.css']
})
export class EmployeeComponent implements OnInit {

  constructor() { }

  Name="Yogesh"
  email=" "
 color="Red"
  

  ngOnInit() {
  }
  xyz(eml:string){
    console.log(eml)
    this.email=eml
    // this.Name="YOOYo"

   // console.log('jbbjbjb')




  }  
}
