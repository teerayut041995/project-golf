import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AuthGuard } from './auth/auth.guard';
import { HomeComponent } from './home/home.component';
import { LoginComponent } from './auth/login/login.component';
import { RegisterComponent } from './auth/register/register.component';
import { RegisterCompleteComponent } from './auth/register-complete/register-complete.component';
import { ProfileComponent } from './pages/profile/profile.component';
import { PromotiomListComponent } from './pages/promotion/promotiom-list/promotiom-list.component';
import { PromotiomDetailComponent } from './pages/promotion/promotiom-detail/promotiom-detail.component';
import { ActivityListComponent } from './pages/activity/activity-list/activity-list.component';
import { ActivityDetailComponent } from './pages/activity/activity-detail/activity-detail.component';

const routes: Routes = [
  { path: '' , component: HomeComponent },
  { path: 'promotion' , component: PromotiomListComponent},
  { path: 'promotion/:slug' , component: PromotiomDetailComponent},
  { path: 'activity' , component: ActivityListComponent},
  { path: 'activity/:slug' , component: ActivityDetailComponent},
  { path: 'profile' , component: ProfileComponent , canActivate: [AuthGuard]},
  { path: 'auth/login' , component: LoginComponent },
  { path: 'auth/register' , component: RegisterComponent },
  { path: 'auth/register-completed' , component: RegisterCompleteComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
  providers: [AuthGuard]
})
export class AppRoutingModule { }
