import { Component, OnInit, OnDestroy } from '@angular/core';
// import { isPlatformBrowser, isPlatformServer } from '@angular/common';
// import { Inject, PLATFORM_ID } from '@angular/core';
import { Subscription } from 'rxjs';
import { AuthService } from './auth/auth.service';
import { ErrorService } from './error/error.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit, OnDestroy {
  hasError = false;
  private errorSub: Subscription;
  title = 'golf club';

  // @Inject(PLATFORM_ID) private platformId: any,
  constructor(
    private authService: AuthService,
    private errorService: ErrorService
  ) {}


  ngOnInit() {
    this.authService.autoAuthUser();
    this.errorSub = this.errorService.getErrorListener().subscribe(
      message => this.hasError = message !== null
    );
    console.log(this.hasError);
  }

  ngOnDestroy() {
    this.errorSub.unsubscribe();
  }
}
