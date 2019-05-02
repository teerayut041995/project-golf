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
import { ActivityBuyComponent } from './pages/activity/activity-buy/activity-buy.component';
import { ActivityOrderDetailComponent } from './pages/activity/activity-order-detail/activity-order-detail.component';
import { ActivityOrderComponent } from './pages/activity/activity-order/activity-order.component';
import { PromotionBuyComponent } from './pages/promotion/promotion-buy/promotion-buy.component';
import { PromotionOrderDetailComponent } from './pages/promotion/promotion-order-detail/promotion-order-detail.component';
import { PromotionOrderComponent } from './pages/promotion/promotion-order/promotion-order.component';

const routes: Routes = [
  { path: '' , component: HomeComponent },
  { path: 'promotion' , component: PromotiomListComponent},
  { path: 'promotion/:slug' , component: PromotiomDetailComponent},
  { path: 'promotion/buy/:slug' , component: PromotionBuyComponent , canActivate: [AuthGuard]},
  { path: 'promotion/orders/:id' , component: PromotionOrderDetailComponent , canActivate: [AuthGuard]},
  { path: 'profile/promotion-orders' , component: PromotionOrderComponent , canActivate: [AuthGuard]},
  { path: 'activity' , component: ActivityListComponent},
  { path: 'activity/:slug' , component: ActivityDetailComponent},
  { path: 'activity/buy/:slug' , component: ActivityBuyComponent , canActivate: [AuthGuard]},
  { path: 'activity/orders/:id' , component: ActivityOrderDetailComponent , canActivate: [AuthGuard]},
  { path: 'profile/activity-orders' , component: ActivityOrderComponent , canActivate: [AuthGuard]},
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
