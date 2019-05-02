import { Component, OnInit } from '@angular/core';
import { ActivityService } from '../activity.service';
import { Subscription } from 'rxjs';
import { Router } from '@angular/router';

@Component({
  selector: 'app-activity-order',
  templateUrl: './activity-order.component.html',
  styleUrls: ['./activity-order.component.scss']
})
export class ActivityOrderComponent implements OnInit {
  orders: any;
  private orderSub: Subscription;
  constructor(private activityService: ActivityService, private router: Router) { }

  ngOnInit() {
    this.activityService.getOrders()
      .subscribe(response => {
        this.orders = response.data;
        console.log(this.orders);
    });
  }

  onOrderDetail(id) {
    this.router.navigate(['/activity/orders/' + id]);
  }

}
