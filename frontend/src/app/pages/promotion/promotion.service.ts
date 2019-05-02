import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { environment } from './../../../environments/environment.prod';
import { Router } from '@angular/router';
import { Subject } from 'rxjs';

const BACKEND_URL = environment.apiUrl;

@Injectable({
  providedIn: 'root'
})
export class PromotionService {
  order: any;
  private orderUpdated = new Subject<any>();

  constructor(private http: HttpClient, private router: Router) { }

  getPromotionNow() {
    return this.http.get<{ message: string; data: any }>(BACKEND_URL + '/promotions/now');
  }

  getPromotion() {
    return this.http.get<{ data: any }>(BACKEND_URL + '/promotions/active');
  }

  getPromotionDetail(slug: string) {
    return this.http.get<{ data: any }>(BACKEND_URL + '/promotions/' + slug);
  }

  buyPromotion(id: string, date: string) {
    const data = {id: id, service_date: date};
    this.http.post<{data: any}>(BACKEND_URL + '/promotions/buy' , data)
      .subscribe(response => {
        this.router.navigate(['promotion/orders/' + response.data.id]);
      } , error => {
      });
  }

  getOrders() {
    return this.http.get<{data: any}>(BACKEND_URL + '/promotions/orders/all');
  }

  getOrder(id: string) {
    this.http.get<{data: any}>(BACKEND_URL + '/promotions/orders/' + id)
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
        BACKEND_URL + '/promotions/orders/' + id,
        data
      )
      .subscribe(response => {
        this.order = response.data;
        this.orderUpdated.next(this.order);
        console.log(response);
      });
  }

}
