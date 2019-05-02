import { Component, OnInit, OnDestroy } from '@angular/core';
import { AuthService } from './../../auth/auth.service';
import { Subscription } from 'rxjs';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit , OnDestroy {
  userIsAuthenticated = false;
  private authListenerSubs: Subscription;
  name: string;
  private nameSub: Subscription;
  constructor(private authService: AuthService) { }

  ngOnInit() {
    this.userIsAuthenticated = this.authService.getIsAuth();
    this.authListenerSubs = this.authService.getAuthStatusListerner()
      .subscribe(isAuthenticated => {
        this.userIsAuthenticated = isAuthenticated;
    });
    this.name = localStorage.getItem('name');
    this.nameSub = this.authService.getAuthDataUpdateListener()
      .subscribe(response => {
        console.log('test : ', response);
        this.name = response;
      });
  }

  onLogout() {
    // /this.name = '';
    this.authService.logout();
  }

  ngOnDestroy() {
    // this.authListenerSubs.unsubscribe();
    // this.nameSub.unsubscribe();
  }
}
