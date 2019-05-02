import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { ReactiveFormsModule, FormsModule } from '@angular/forms';
import { MDBBootstrapModule } from 'angular-bootstrap-md';
import { NguCarouselModule } from '@ngu/carousel';

import {MatDialogModule} from '@angular/material/dialog';

import { CommonModule } from '@angular/common';
import { TransferHttpCacheModule } from '@nguniversal/common';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
import { NgtUniversalModule } from '@ng-toolkit/universal';

import { FlatpickrModule } from 'angularx-flatpickr';
import { CalendarModule, DateAdapter } from 'angular-calendar';
import { adapterFactory } from 'angular-calendar/date-adapters/date-fns';

import { NgbModule } from '@ng-bootstrap/ng-bootstrap';

// import { ModalModule, WavesModule, InputsModule, ButtonsModule } from 'angular-bootstrap-md';

import { AuthInterceptor } from './auth/auth-interceptor';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './component/header/header.component';
import { SliderComponent } from './component/slider/slider.component';
import { FooterComponent } from './component/footer/footer.component';
import { LoginComponent } from './auth/login/login.component';
import { RegisterComponent } from './auth/register/register.component';
import { HomeComponent } from './home/home.component';
import { LoaderComponent } from './component/loader/loader.component';
import { RegisterCompleteComponent } from './auth/register-complete/register-complete.component';
import { ProfileComponent } from './pages/profile/profile.component';
import { PromotionNowComponent } from './pages/promotion/promotion-now/promotion-now.component';
import { ActivityCalendarComponent } from './pages/activity/activity-calendar/activity-calendar.component';
import { PromotiomListComponent } from './pages/promotion/promotiom-list/promotiom-list.component';
import { PromotiomDetailComponent } from './pages/promotion/promotiom-detail/promotiom-detail.component';
import { ActivityDetailComponent } from './pages/activity/activity-detail/activity-detail.component';
import { ActivityListComponent } from './pages/activity/activity-list/activity-list.component';
import { ActivityBuyComponent } from './pages/activity/activity-buy/activity-buy.component';
import { ActivityOrderDetailComponent } from './pages/activity/activity-order-detail/activity-order-detail.component';
import { ActivityOrderComponent } from './pages/activity/activity-order/activity-order.component';
import { PromotionBuyComponent } from './pages/promotion/promotion-buy/promotion-buy.component';
import { ErrorInterceptor } from './error-interceptor';
import { ErrorComponent } from './error/error.component';
import { PromotionOrderDetailComponent } from './pages/promotion/promotion-order-detail/promotion-order-detail.component';
import { PromotionOrderComponent } from './pages/promotion/promotion-order/promotion-order.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    SliderComponent,
    FooterComponent,
    LoginComponent,
    RegisterComponent,
    HomeComponent,
    LoaderComponent,
    RegisterCompleteComponent,
    ProfileComponent,
    PromotionNowComponent,
    ActivityCalendarComponent,
    PromotiomListComponent,
    PromotiomDetailComponent,
    ActivityDetailComponent,
    ActivityListComponent,
    ActivityBuyComponent,
    ActivityOrderDetailComponent,
    ActivityOrderComponent,
    PromotionBuyComponent,
    ErrorComponent,
    PromotionOrderDetailComponent,
    PromotionOrderComponent
  ],
  imports: [
    BrowserAnimationsModule,
    BrowserModule.withServerTransition({ appId: 'serverApp' }),
    MDBBootstrapModule.forRoot(),
    ReactiveFormsModule,
    FormsModule,
    HttpClientModule,
    NguCarouselModule,
    MatDialogModule,
    FlatpickrModule.forRoot(),
    CalendarModule.forRoot({
      provide: DateAdapter,
      useFactory: adapterFactory
    }),
    NgbModule,
    AppRoutingModule,
    CommonModule,
    TransferHttpCacheModule,
    HttpClientModule,
    NgtUniversalModule
  ],
  providers: [
    {provide: HTTP_INTERCEPTORS , useClass: AuthInterceptor , multi: true},
    {provide: HTTP_INTERCEPTORS , useClass: ErrorInterceptor , multi: true}
  ],
  bootstrap: [AppComponent],
  entryComponents: [ErrorComponent]
})
export class AppModule { }
