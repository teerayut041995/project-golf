import {
  Component,
  OnInit,
  ChangeDetectionStrategy,
  AfterViewInit,
  ChangeDetectorRef
} from '@angular/core';
import { NguCarouselConfig } from '@ngu/carousel';
import { slider } from '../../slide-animation';
import { PromotionService } from '../../services/promotion.service';
import { Promotion } from './../../models/promotion.model';

@Component({
  selector: 'app-promotion-slide',
  templateUrl: './promotion-slide.component.html',
  styleUrls: ['./promotion-slide.component.scss'],
  animations: [slider],
  changeDetection: ChangeDetectionStrategy.OnPush
})
export class PromotionSlideComponent implements OnInit ,  AfterViewInit {
  promotions: Promotion[] = [];

  public carouselTileItems: Array<any> = [
    // {
    //   photo: "./assets/images/show/promotion/0.jpg",
    //   text: `Adipisci quas repellat sed. Quasi quaerat aut nam possimus
    // vitae dignissimos, sapiente est atque tenetur`,
    //   title: "Project 1"
    // },
    // {
    //   photo: "./assets/images/show/promotion/1.jpg",
    //   text: `Adipisci quas repellat sed. Quasi quaerat aut nam possimus
    // vitae dignissimos, sapiente est atque tenetur`,
    //   title: "Project 2"
    // },
    // {
    //   photo: "./assets/images/show/promotion/2.jpg",
    //   text: `Adipisci quas repellat sed. Quasi quaerat aut nam possimus
    // vitae dignissimos, sapiente est atque tenetur`,
    //   title: "Project 3"
    // },
    // {
    //   photo: "./assets/images/show/promotion/3.jpg",
    //   text: `Adipisci quas repellat sed. Quasi quaerat aut nam possimus
    // vitae dignissimos, sapiente est atque tenetur`,
    //   title: "Project 4"
    // },
    // {
    //   photo: "./assets/images/show/promotion/4.jpg",
    //   text: `Adipisci quas repellat sed. Quasi quaerat aut nam possimus
    // vitae dignissimos, sapiente est atque tenetur`,
    //   title: "Project 5"
    // },
    // {
    //   photo: "./assets/images/show/promotion/5.jpg",
    //   text: `Adipisci quas repellat sed. Quasi quaerat aut nam possimus
    // vitae dignissimos, sapiente est atque tenetur`,
    //   title: "Project 6"
    // },
    // {
    //   photo: "./assets/images/show/promotion/6.jpg",
    //   text: `Adipisci quas repellat sed. Quasi quaerat aut nam possimus
    // vitae dignissimos, sapiente est atque tenetur`,
    //   title: "Project 7"
    // }
  ];

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
    easing: "cubic-bezier(0, 0, 0.2, 1)"
  };
  public carouselTileConfig: NguCarouselConfig = {
        grid: { xs: 1, sm: 1, md: 3, lg: 3, all: 0 },
        speed: 300,
        point: {
          visible: true
        },
        touch: true,
        loop: true,
        interval: { timing: 2000 },
        animation: 'lazy'
      };

  constructor(private cdr: ChangeDetectorRef, private promotionService: PromotionService) {}
  ngOnInit() {
    this.promotionService.getPromotionNow()
      .subscribe(response => {
        this.promotions = response.data.data;
        this.carouselTileItems = response.data.data;
        console.log(response.data.data);
    });
  }

  ngAfterViewInit() {
    this.cdr.detectChanges();
  }
}
