import { Component, OnInit } from '@angular/core';
import { PromotionService } from '../promotion.service';
import { Promotion } from './../promotion.model';

@Component({
  selector: 'app-promotiom-list',
  templateUrl: './promotiom-list.component.html',
  styleUrls: ['./promotiom-list.component.scss']
})
export class PromotiomListComponent implements OnInit {

  promotions: Promotion[] = [];

  constructor(private promotionService: PromotionService) { }

  ngOnInit() {
    this.promotionService.getPromotion()
      .subscribe(response => {
      this.promotions = response.data;
      console.log(this.promotions);
    });
  }
}
