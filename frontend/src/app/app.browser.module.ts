import { BrowserModule, BrowserTransferStateModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { MDBBootstrapModule } from 'angular-bootstrap-md';
// import { NgxCarouselModule } from 'ngx-carousel';
// import { FullCalendarModule } from 'ng-fullcalendar';


import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './component/header/header.component';
import { SliderComponent } from './component/slider/slider.component';
import { PromotionSlideComponent } from './component/promotion-slide/promotion-slide.component';
import { ActivityCalenderComponent } from './component/activity-calender/activity-calender.component';
import { FooterComponent } from './component/footer/footer.component';
import { AppModule } from './app.module';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

@NgModule({
  imports: [
    MDBBootstrapModule.forRoot(),
    // NgxCarouselModule,
    // FullCalendarModule,
    AppRoutingModule,
    AppModule,
    BrowserTransferStateModule,
    BrowserAnimationsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppBrowserModule { }
