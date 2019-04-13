import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { BrowserModule } from '@angular/platform-browser';
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
    ActivityListComponent
  ],
  imports: [
    BrowserAnimationsModule,
    BrowserModule.withServerTransition({ appId: 'serverApp' }),
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
