import { Component, OnInit, OnDestroy } from '@angular/core';
import { PromotionService } from '../promotion.service';
import { ActivatedRoute, ParamMap, Router } from '@angular/router';
import { Promotion } from './../promotion.model';
import { AuthService } from './../../../auth/auth.service';
import { Subscription } from 'rxjs';

@Component({
  selector: 'app-promotiom-detail',
  templateUrl: './promotiom-detail.component.html',
  styleUrls: ['./promotiom-detail.component.scss']
})
export class PromotiomDetailComponent implements OnInit, OnDestroy {
  userIsAuthenticated = false;
  private authListenerSubs: Subscription;
  private slug: string;
  promotion: Promotion;

  constructor(
    private promotionService: PromotionService,
    public route: ActivatedRoute,
    private authService: AuthService,
    private router: Router
  ) { }

  ngOnInit() {
    this.route.paramMap.subscribe((paramMap: ParamMap) => {
      if (paramMap.has('slug')) {
        this.slug = paramMap.get('slug');
        this.promotionService.getPromotionDetail(this.slug).subscribe(response => {
          this.promotion = response.data;
          console.log(this.promotion);
        });
      } else {

      }
    });

    this.userIsAuthenticated = this.authService.getIsAuth();
    this.authListenerSubs = this.authService.getAuthStatusListerner()
      .subscribe(isAuthenticated => {
      this.userIsAuthenticated = isAuthenticated;
    });
  }

  onBuyPromotion() {
    this.router.navigate(['/promotion/buy/' + this.promotion.pro_slug]);
  }

  ngOnDestroy() {
    this.authListenerSubs.unsubscribe();
  }
}
