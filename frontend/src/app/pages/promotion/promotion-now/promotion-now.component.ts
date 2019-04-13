import {
  Component,
  OnInit,
  AfterViewInit,
  ChangeDetectorRef,
} from '@angular/core';
import { NguCarouselConfig } from '@ngu/carousel';
import { PromotionService } from '../promotion.service';
import { Promotion } from './../promotion.model';
import { Subscription } from 'rxjs';


@Component({
  selector: 'app-promotion-now',
  templateUrl: './promotion-now.component.html',
  styleUrls: ['./promotion-now.component.scss']
})

export class PromotionNowComponent implements OnInit ,  AfterViewInit {


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

  constructor(private cdr: ChangeDetectorRef, private promotionService: PromotionService) {}

  ngOnInit() {
    this.promotionService.getPromotionNow();
    this.promotionSub = this.promotionService.getPromotionDataListener()
      .subscribe((response: Promotion[]) => {
        this.carouselTileItems = response;
      });
  }

  ngAfterViewInit() {
    this.cdr.detectChanges();
  }
}
