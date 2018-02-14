import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { FormsModule }  from '@angular/forms';
import { AppComponent } from './app.component';

import { LoginModule } from './login/login.module';
import { DashboradModule } from './dashborad/dashborad.module';

import { HttpClientModule } from '@angular/common/http';
import { RegComponent } from './reg/reg.component';


@NgModule({
  declarations: [
    AppComponent,
    RegComponent
 
  ],
  imports: [
    BrowserModule,
    FormsModule,
    AppRoutingModule,
    LoginModule,
    DashboradModule,
    
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
