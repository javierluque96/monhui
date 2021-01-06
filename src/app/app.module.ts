import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';

import { AppRoutingModule } from './app-routing.module';

import { AppComponent } from './app.component';
import { NavigationComponent } from './components/navigation/navigation.component';
import { MountainListComponent } from './components/mountain-list/mountain-list.component';
import { MountainFormComponent } from './components/mountain-form/mountain-form.component';

@NgModule({
  declarations: [
    AppComponent,
    NavigationComponent,
    MountainListComponent,
    MountainFormComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
