import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { MDBBootstrapModule } from 'angular-bootstrap-md';
import { NguCarouselModule } from '@ngu/carousel';

import { CommonModule } from '@angular/common';
import { TransferHttpCacheModule } from '@nguniversal/common';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
import { NgtUniversalModule } from '@ng-toolkit/universal';

import { FlatpickrModule } from 'angularx-flatpickr';
import { CalendarModule, DateAdapter } from 'angular-calendar';
import { adapterFactory } from 'angular-calendar/date-adapters/date-fns';

import {MatProgressSpinnerModule} from '@angular/material/progress-spinner';

import { AuthInterceptor } from './auth/auth-interceptor';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './component/header/header.component';
import { SliderComponent } from './component/slider/slider.component';
import { PromotionSlideComponent } from './component/promotion-slide/promotion-slide.component';
import { ActivityCalenderComponent } from './component/activity-calender/activity-calender.component';
import { FooterComponent } from './component/footer/footer.component';
import { LoginComponent } from './auth/login/login.component';
import { RegisterComponent } from './auth/register/register.component';
import { HomeComponent } from './home/home.component';
import { LoaderComponent } from './component/loader/loader.component';
import { RegisterCompleteComponent } from './auth/register-complete/register-complete.component';
import { ProfileComponent } from './pages/profile/profile.component';
import { PromotionComponent } from './pages/promotion/promotion.component';
import { ActivityComponent } from './pages/activity/activity.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    SliderComponent,
    PromotionSlideComponent,
    ActivityCalenderComponent,
    FooterComponent,
    LoginComponent,
    RegisterComponent,
    HomeComponent,
    LoaderComponent,
    RegisterCompleteComponent,
    ProfileComponent,
    PromotionComponent,
    ActivityComponent,
  ],
  imports: [
    BrowserModule.withServerTransition({ appId: 'serverApp' }),
    BrowserAnimationsModule,
    MDBBootstrapModule.forRoot(),
    FormsModule,
    HttpClientModule,
    NguCarouselModule,
    MatProgressSpinnerModule,
    FlatpickrModule.forRoot(),
    CalendarModule.forRoot({
      provide: DateAdapter,
      useFactory: adapterFactory
    }),
    AppRoutingModule,
    CommonModule,
    TransferHttpCacheModule,
    HttpClientModule,
    NgtUniversalModule
  ],
  providers: [
    {provide: HTTP_INTERCEPTORS , useClass: AuthInterceptor , multi: true}
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
