import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Subject } from 'rxjs';
import { environment } from './../../../environments/environment.prod';
import { Router } from '@angular/router';

const BACKEND_URL = environment.apiUrl;

@Injectable({
  providedIn: 'root'
})
export class ActivityService {
  order: any;
  orders: any;
  private orderUpdated = new Subject<any>();

  constructor(private http: HttpClient, private router: Router) { }

  getActivityDetail(slug: string) {
    return this.http.get<{ data: any }>(BACKEND_URL + '/activities/' + slug);
  }

  buyActivity(id: string) {
    const data = {id: id};
    this.http.post<{data: any}>(BACKEND_URL + '/activities/buy' , data)
      .subscribe(response => {
        this.router.navigate(['activity/orders/' + response.data.id]);
      } , error => {
        console.log(error);
      });
  }

  getOrders() {
    return this.http.get<{data: any}>(BACKEND_URL + '/activities/orders/all');
  }

  getOrder(id: string) {
    this.http.get<{data: any}>(BACKEND_URL + '/activities/orders/' + id)
      .subscribe(response => {
        this.order = response.data;
        console.log(this.order);
        this.orderUpdated.next(this.order);
      });
  }

  getOrderUpdateListener() {
    return this.orderUpdated.asObservable();
  }

  updatePayment(id: string, bank_id: string, payment_date: string, payment_time: string, payment_amount: string, image: any) {
    const data = {bank_id: bank_id, payment_date: payment_date, payment_time: payment_time, payment_amount: payment_amount, payment_image: image};
    this.http
      .patch<{ message: string; data: any }>(
        BACKEND_URL + '/activities/orders/' + id,
        data
      )
      .subscribe(response => {
        this.order = response.data;
        this.orderUpdated.next(this.order);
        console.log(response);
      });
  }
}
