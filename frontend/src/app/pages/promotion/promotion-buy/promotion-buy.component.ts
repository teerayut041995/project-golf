import { Component, OnInit, ViewChild, AfterViewInit} from '@angular/core';
import { PromotionService } from '../promotion.service';
import { ActivatedRoute, Router, ParamMap } from '@angular/router';
import { Promotion } from './../promotion.model';
import { ErrorService } from './../../../error/error.service';
import { ModalModule, ModalDirective, WavesModule, InputsModule } from 'angular-bootstrap-md'


@Component({
  selector: 'app-promotion-buy',
  templateUrl: './promotion-buy.component.html',
  styleUrls: ['./promotion-buy.component.scss']
})
export class PromotionBuyComponent implements OnInit {

  private slug: string;
  promotion: Promotion;
  minDate: any;
  maxDate = {year: 2019, month: 4, day: 25};
  model: any;
  date: any;
  message: string;

  constructor(
    private promotionService: PromotionService,
    private route: ActivatedRoute,
    private router: Router,
    private errorService: ErrorService
  ) { }

  ngOnInit() {

    this.route.paramMap.subscribe((paramMap: ParamMap) => {
      if (paramMap.has('slug')) {
        this.slug = paramMap.get('slug');
        this.promotionService.getPromotionDetail(this.slug).subscribe(response => {
          this.promotion = response.data;
          console.log(this.promotion);
          const dateStart = this.promotion.pro_start_date.split('-');
          const dateEnd = this.promotion.pro_end_date.split('-');
          this.minDate = {year: parseInt(dateStart[0]), month: parseInt(dateStart[1]), day: parseInt(dateStart[2])};
          this.maxDate = {year: parseInt(dateEnd[0]), month: parseInt(dateEnd[1]), day: parseInt(dateEnd[2])};
          console.log(this.maxDate);
        });
      }
    });
  }

  onBuyPromotion() {
    if (!this.model) {
      this.message = 'กรุณาเลือกวันที่ใช้บริการ';
      // alert('กรุณาเลือกวันที่ใช้บริการ');
      return;
    }
    const date = this.model.year + '-' + this.model.month + '-' + this.model.day;
    this.promotionService.buyPromotion(this.promotion.id, date);
  }
}
