import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AuthGuard } from './auth/auth.guard';
import { HomeComponent } from './home/home.component';
import { LoginComponent } from './auth/login/login.component';
import { RegisterComponent } from './auth/register/register.component';
import { RegisterCompleteComponent } from './auth/register-complete/register-complete.component';
import { ProfileComponent } from './pages/profile/profile.component';
import { PromotionComponent } from './pages/promotion/promotion.component';
import { ActivityComponent } from './pages/activity/activity.component';

const routes: Routes = [
  { path: '' , component: HomeComponent },
  { path: 'promotion' , component: PromotionComponent},
  { path: 'activity' , component: ActivityComponent},
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
