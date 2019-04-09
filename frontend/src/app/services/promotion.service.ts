import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Subject } from 'rxjs';
import { map } from 'rxjs/operators';
import { Promotion } from './../models/promotion.model';
import { environment } from './../../environments/environment.prod';

const BACKEND_URL = environment.apiUrl;

@Injectable({
  providedIn: 'root'
})
export class PromotionService {
  private promotions: Promotion[] = [];
  private promotionData = new Subject<Promotion[]>();

  constructor(private http: HttpClient) { }

  getPromotionNow() {
    return this.http.get<{ message: string; promotions: any, data: any }>(BACKEND_URL + '/promotions/now');
    // this.http
    //   .get<{ message: string; promotions: any, data: any }>(
    //     BACKEND_URL + '/promotions/now'
    //   ).subscribe(response => {
    //     this.promotions = response.data;
    //     this.promotionData.next([...this.promotions]);
    //     console.log(this.promotions);
    //   });
  }

}
