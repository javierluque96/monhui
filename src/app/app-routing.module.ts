import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { MountainFormComponent } from './components/mountain-form/mountain-form.component';
import { MountainListComponent } from './components/mountain-list/mountain-list.component';

const routes: Routes = [
  { path: '', redirectTo: '/mountains', pathMatch: 'full' },
  { path: 'mountains', component: MountainListComponent },
  { path: 'mountains/add', component: MountainFormComponent },
  { path: 'mountains/edit/:id', component: MountainFormComponent },
  // { path: '**', component: PageNotFoundComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule {}
