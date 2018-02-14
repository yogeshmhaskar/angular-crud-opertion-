import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import {Reg} from './reg';
import { HttpHeaders } from '@angular/common/http';

@Injectable()
export class RegService {

  constructor(

    private http:HttpClient
  ) { }


  insertOne(rg:Reg){
    console.log(rg)
      return this.http.post('http://localhost:3000/registration',rg,{

          headers:new HttpHeaders({
            'Content-Type':'application/json'
          })
      })
  }
    // reg(rg : Reg){

    //  return  this.http.post(`http://localhost:1337/Registration`,rg,{
    //     headers: new HttpHeaders({
    //       'Content-Type':'application/json'
    //     })

    //  })
    // }
}
