import {
  Component,
  OnInit,
  AfterViewInit,
  ChangeDetectorRef,
  OnDestroy,
} from '@angular/core';
import { NguCarouselConfig } from '@ngu/carousel';
import { PromotionService } from '../promotion.service';
import { Promotion } from './../promotion.model';
import { Subscription } from 'rxjs';
import { AuthService } from './../../../auth/auth.service';


@Component({
  selector: 'app-promotion-now',
  templateUrl: './promotion-now.component.html',
  styleUrls: ['./promotion-now.component.scss']
})

export class PromotionNowComponent implements OnInit , OnDestroy , AfterViewInit {
  userIsAuthenticated = false;
  private authListenerSubs: Subscription;

  public carouselTileItems: Array<any> = [];

  public carouselTile: NguCarouselConfig = {
    grid: { xs: 1, sm: 2, md: 3, lg: 3, all: 0 },
    slide: 1,
    speed: 250,
    point: {
      visible: true
    },
    load: 2,
    velocity: 0,
    touch: true,
    easing: 'cubic-bezier(0, 0, 0.2, 1)'
  };
  carouselTileConfig: NguCarouselConfig = {
        grid: { xs: 1, sm: 1, md: 3, lg: 3, all: 0 },
        speed: 300,
        point: {
          visible: true
        },
        touch: true,
        loop: true,
        interval: { timing: 2000 }
      };

  posts: Promotion[] = [];
  private promotionSub: Subscription;

  constructor(private cdr: ChangeDetectorRef, private promotionService: PromotionService, private authService: AuthService) {}

  ngOnInit() {
    this.promotionService.getPromotionNow()
      .subscribe(response => {
        this.carouselTileItems = response.data;
    });

    this.userIsAuthenticated = this.authService.getIsAuth();
    this.authListenerSubs = this.authService.getAuthStatusListerner()
      .subscribe(isAuthenticated => {
      this.userIsAuthenticated = isAuthenticated;
    });

  }

  ngAfterViewInit() {
    this.cdr.detectChanges();
  }

  ngOnDestroy() {
    // this.authListenerSubs.unsubscribe();
  }
}
