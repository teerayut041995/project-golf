import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { AuthService } from '../auth.service';
import { Subscription } from 'rxjs';
import { Router } from '@angular/router';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.scss']
})
export class RegisterComponent implements OnInit {
  public error = {
    name: '',
    username: '',
    password: '',
    phone: ''
  };
  isLoading = false;
  private errorStatusSub: Subscription;
  userIsAuthenticated = false;
  private authListenerSubs: Subscription;

  constructor(private authService: AuthService, private router: Router) { }

  ngOnInit() {
    this.userIsAuthenticated = this.authService.getIsAuth();
    if (this.userIsAuthenticated) {
      this.router.navigate(['/']);
    }
    this.authListenerSubs = this.authService.getAuthStatusListerner()
      .subscribe(isAuthenticated => {
        this.userIsAuthenticated = isAuthenticated;
    });
    this.errorStatusSub = this.authService.getErrorListener().subscribe(
      errorStatus => {
        this.error = errorStatus;
        this.isLoading = false;
      }
    );
  }

  onRegister(form: NgForm) {
    if(form.invalid) {
      return;
    }
    this.isLoading = true;
    this.authService.register(form.value.first_name + ' ' + form.value.last_name, form.value.username, form.value.password, form.value.password_confirmation, form.value.phone, form.value.email);
  }

  onKeyUsername(event: any) {
    this.error.username = '';
  }
  onKeyName(event: any) {
    this.error.name = '';
  }
  onKeyPassword(event: any) {
    this.error.password = '';
  }
  onKeyPhone(event: any) {
    this.error.phone = '';
  }
}
