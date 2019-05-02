import { Component, OnInit } from '@angular/core';
import { PromotionService } from '../promotion.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-promotion-order',
  templateUrl: './promotion-order.component.html',
  styleUrls: ['./promotion-order.component.scss']
})
export class PromotionOrderComponent implements OnInit {
  orders: any;

  constructor(private promotionService: PromotionService, private router: Router) { }

  ngOnInit() {
    this.promotionService.getOrders()
      .subscribe(response => {
        this.orders = response.data;
        console.log(this.orders);
    });
  }

  onOrderDetail(id) {
    this.router.navigate(['/promotion/orders/' + id]);
  }

}
