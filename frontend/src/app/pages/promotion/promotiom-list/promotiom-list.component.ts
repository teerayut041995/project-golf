import { Component, OnInit, OnDestroy } from '@angular/core';
import { PromotionService } from '../promotion.service';
import { Promotion } from './../promotion.model';
import { AuthService } from './../../../auth/auth.service';
import { Subscription } from 'rxjs';

@Component({
  selector: 'app-promotiom-list',
  templateUrl: './promotiom-list.component.html',
  styleUrls: ['./promotiom-list.component.scss']
})
export class PromotiomListComponent implements OnInit, OnDestroy {
  userIsAuthenticated = false;
  private authListenerSubs: Subscription;
  promotions: Promotion[] = [];

  constructor(private promotionService: PromotionService, private authService: AuthService) { }

  ngOnInit() {
    this.promotionService.getPromotion()
      .subscribe(response => {
      this.promotions = response.data;
      console.log(this.promotions);
    });

    this.userIsAuthenticated = this.authService.getIsAuth();
    this.authListenerSubs = this.authService.getAuthStatusListerner()
      .subscribe(isAuthenticated => {
      this.userIsAuthenticated = isAuthenticated;
    });
  }

  ngOnDestroy() {
    this.authListenerSubs.unsubscribe();
  }
}
