import { Component, OnInit } from '@angular/core';
import { Promotion } from './../../models/promotion.model';
import { Subscription, Subject } from 'rxjs';
import { PromotionService } from './../../services/promotion.service';


@Component({
  selector: 'app-promotion',
  templateUrl: './promotion.component.html',
  styleUrls: ['./promotion.component.scss']
})
export class PromotionComponent implements OnInit {
  promotions: Promotion[] = [];

  constructor(private promotionService: PromotionService) { }

  ngOnInit() {
    this.promotionService.getPromotionNow()
      .subscribe(response => {
        this.promotions = response.data.data;
        console.log(response.data.data);
      });
    // this.promotionSub = this.promotionService.getPromotionDataListener()
    //   .subscribe((promotions: Promotion[]) => {
    //     this.promotions = promotions;
    // });
  }

}
