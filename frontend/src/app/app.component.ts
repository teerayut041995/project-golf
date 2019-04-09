import { Component, OnInit } from '@angular/core';
import { isPlatformBrowser, isPlatformServer } from '@angular/common';
import { Inject, PLATFORM_ID } from '@angular/core';
import { AuthService } from './auth/auth.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit {
  title = 'golf club';
  // @Inject(PLATFORM_ID) private platformId: any,
  constructor(private authService: AuthService) {}


  ngOnInit() {
    this.authService.autoAuthUser();
  }
}
