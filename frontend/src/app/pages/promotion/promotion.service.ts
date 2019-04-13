import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Promotion } from './promotion.model';
import { environment } from './../../../environments/environment.prod';
import { Subject } from 'rxjs';

const BACKEND_URL = environment.apiUrl;

@Injectable({
  providedIn: 'root'
})
export class PromotionService {
  private promotions: Promotion[] = [];
  private promotionsData = new Subject<Promotion[]>();

  constructor(private http: HttpClient) { }

  getPromotionNow() {
    this.http.get<{ message: string; data: any }>(BACKEND_URL + '/promotions/now')
      .subscribe(response => {
        this.promotions = response.data;
        this.promotionsData.next([...this.promotions]);
    });
  }

  getPromotionDataListener() {
    return this.promotionsData.asObservable();
  }

  getPromotion() {
    return this.http.get<{ data: any }>(BACKEND_URL + '/promotions/active');
  }

  getPromotionDetail(slug: string) {
    return this.http.get<{ data: any }>(BACKEND_URL + '/promotions/' + slug);
  }
}
