import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

import {Cake} from './cake';


@Injectable()
export class CakeService {
 abc:any;
  constructor(
    private http:HttpClient
  ) { }

  Savedata(forma:any){
  
  console.log(forma)
  return this.http.post('http://localhost:3000/registration',forma,{
       headers:new HttpHeaders({
         'Content-Type':'application/json'
       })
     })
  }

  selectrec(_id:string ,onResult:(cake)=>void){

    console.log()
  
    return this.http.post('http://localhost:3000/display',_id,{
      headers:new HttpHeaders({
        'Content-Type':'application/json'
      })
    }).subscribe(
      (response: Response) => onResult(response),
      err => onResult(err),
    )
  }

  updatecake(abc){

    let cake=new Cake()

    cake._id=abc._id
    cake.name=abc.name
    cake.address=abc.address
    cake.mobileno=abc.mobileno

    return this.http.put('http://localhost:3000/updatecakesoft',abc,{
      headers:new HttpHeaders({
        'Content-Type':'application/json'
      })
    })
  }
  
  deleteData(_id){

  
    let cake=new Cake()
    cake._id=_id
  
  return  this.http.post(`http://localhost:3000/delete`,cake,{
      headers: new HttpHeaders({
        'Content-Type':'application/json'
      })
    }
    )
  }

}