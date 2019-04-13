import { Component, OnInit } from '@angular/core';
import { PromotionService } from '../promotion.service';
import { ActivatedRoute, ParamMap } from '@angular/router';
import { Promotion } from './../promotion.model';

@Component({
  selector: 'app-promotiom-detail',
  templateUrl: './promotiom-detail.component.html',
  styleUrls: ['./promotiom-detail.component.scss']
})
export class PromotiomDetailComponent implements OnInit {
  private slug: string;
  promotion: Promotion;

  constructor(private promotionService: PromotionService , public route: ActivatedRoute) { }

  ngOnInit() {
    this.route.paramMap.subscribe((paramMap: ParamMap) => {
      if (paramMap.has('slug')) {
        this.slug = paramMap.get('slug');
        //alert(this.slug);
        this.promotionService.getPromotionDetail(this.slug).subscribe(response => {
          this.promotion = response.data;
          console.log(this.promotion);
        });
      } else {

      }
    });
  }

}
