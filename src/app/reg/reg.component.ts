import { Component, OnInit } from '@angular/core';
import { RegService } from './reg.service';
import { Reg } from './reg';
import { HttpClient,HttpHeaders } from '@angular/common/http';

@Component({
  selector: 'app-reg',
  templateUrl: './reg.component.html',
  styleUrls: ['./reg.component.css'],
  providers : [RegService]
})
export class RegComponent implements OnInit {

  emlptn="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?";

  name:string
  address :string
  email :string
  mobileno:number
  pincode :number

  resmsg:string

  constructor(
    private regService : RegService,
    private http : HttpClient
  ) { }

  ngOnInit() {
  }

  onSubmit(frm : any){

    console.log(frm)
    this.regService.insertOne(frm as Reg).subscribe(
      res=>console.log(res),
      err=>console.log(err),
      ()=>{
        this.resmsg="Record Saved Successfully..."
      }
    )
    // location.reload();
    // this.regService.reg(frm.value as Reg).subscribe(
    //  res => console.log(res),
    //   err=> console.log(err),
    //   () => console.log(`Record Save Successfully`)
    // )

  }




}
