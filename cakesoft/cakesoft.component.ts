import { Component, OnInit } from '@angular/core';
import { CakeService } from './cake.service';
import { HttpClient } from '@angular/common/http';



@Component({
  selector: 'app-cakesoft',
  templateUrl: './cakesoft.component.html',
  styleUrls: ['./cakesoft.component.css'],
  providers:[CakeService]
})
export class CakesoftComponent implements OnInit {

resmsg:string

cakerec:any
_id:string
arr:any
arr1:any
nm:string
add :string
mno:number
id1:string
  constructor(
    private cake:CakeService,
    private http:HttpClient
  ) { 
      
    this.http.get('http://localhost:3000/registration').subscribe(data => {

        this.cakerec=data
    })

  }

  ngOnInit() {
  }

  Save(form : any){
 
    this.cake.Savedata(form).subscribe(
      res =>console.log(res),
      err =>console.log(err),
      () => {
        //alert("dfsfssd")
         this.resmsg='Record Save Successfully' 
       
        }
  
   )
  // location.reload()
  }

  Editrec(_id:string){
   
    this.arr={
      "_id":_id
    }
 
    this.cake.selectrec(this.arr,result=>{

      this.nm=result.name
      this.add=result.address
      this.mno=result.mobileno
      this.id1=result._id
      

    })
  }

  update(name:string,address:string,mobileno:string,id:string){
   console.log(id)
     this.arr1={
      "_id":id,
      "name":name,
      "address":address,
      "mobileno":mobileno

    }
    console.log(this.arr1)
    return this.cake.updatecake(this.arr1).subscribe(

      res=>console.log(res),
      err=>console.log(err),
      ()=>{
  // location.reload()
        this.resmsg="Record Updated Successfully"
      
      }
    )

  }

  Delete(_id:string){

    this.cake.deleteData(_id).subscribe(
      res=>console.log(res),
      err=>console.log(err),
      ()=>{
       
        this.resmsg="Record Deleted Successfully..."
      }
      
    )
    
  }


}
