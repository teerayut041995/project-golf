import { Injectable } from '@angular/core';
import { environment } from './../../environments/environment.prod';
import { HttpClient } from '@angular/common/http';
import { Subject } from 'rxjs';
import { Router } from '@angular/router';
const BACKEND_URL = environment.apiUrl;

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  private token: string;
  private authStatusListener = new Subject<boolean>();
  private isAuthenticated = false;
  private tokenTimer: any;
  private errorListener = new Subject<any>();

  constructor(private http: HttpClient, private router: Router) { }

  getErrorListener() {
    return this.errorListener.asObservable();
  }

  getToken() {
    return this.token;
  }

  getIsAuth() {
    return this.isAuthenticated;
  }

  getAuthStatusListerner() {
    return this.authStatusListener.asObservable();
  }

  register(name: string, username: string, password: string, password_confirmation: string, phone: string, email: string) {
    const data = { name: name, username: username, password: password, password_confirmation: password_confirmation, phone: phone, email: email};
    this.http.post<{data: any}>(BACKEND_URL + '/register' , data)
      .subscribe(response => {
        console.log(response);
        this.router.navigate(['/auth/register-completed' , {status: 'completed'}]);
      } , error => {
        console.log(error.error.error);
        this.errorListener.next(error.error.error);
      });
  }

  login(username: string, password: string) {
    const data = {username: username, password: password};
    this.http.post<{access_token: string , expiresIn: number}>(BACKEND_URL + '/login' , data)
      .subscribe(response => {
        const token = response.access_token;
        this.token = token;
        if (token) {
          const expiresInDuration = response.expiresIn;
          this.setAuthTimer(expiresInDuration);
          this.isAuthenticated = true;
          this.authStatusListener.next(true);
          const now = new Date();
          const expirationDate = new Date(now.getTime() + expiresInDuration * 1000);
          // console.log(expirationDate);
          this.saveAuthData(token , expirationDate);
          this.router.navigate(['/']);
          console.log(response);
        }
      } , error => {
        console.log(error);
      });
  }

  logout() {
    this.http.get<{access_token: string , expiresIn: number}>(BACKEND_URL + '/logout')
      .subscribe(response => {
        this.token = null;
        this.isAuthenticated = false;
        this.authStatusListener.next(false);
        clearTimeout(this.tokenTimer);
        this.clearAuthData();
        this.router.navigate(['/']);
        console.log(response);
      } , error => {
        console.log(error);
      });
  }

  autoAuthUser() {
    const authInformation = this.getAuthData();
    if (!authInformation) {
      return;
    }
    const now = new Date();
    const expiresIn = authInformation.expirationDate.getTime() - now.getTime();
    if (expiresIn > 0) {
      this.token = authInformation.token;
      this.isAuthenticated = true;
      this.setAuthTimer(expiresIn / 1000);
      this.authStatusListener.next(true);
    }
  }

  private setAuthTimer(duration: number) {
    console.log('Setting timer: ' + duration);
    this.tokenTimer = setTimeout(() => {
      this.logout();
    }, duration * 1000);
  }

  private saveAuthData(token: string , expirationDate: Date) {
    localStorage.setItem('token' , token);
    localStorage.setItem('expiration' , expirationDate.toISOString());
  }

  private clearAuthData() {
    localStorage.removeItem('token');
    localStorage.removeItem('expiration');
  }

  private getAuthData() {
    const token = localStorage.getItem('token');
    const expirationDate = localStorage.getItem('expiration');
    if (!token || !expirationDate) {
      return;
    } else {
      return {
        token: token,
        expirationDate: new Date(expirationDate)
      };
    }
  }

}
