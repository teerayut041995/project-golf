import { Component, OnInit } from '@angular/core';
import { ActivityService } from '../activity.service';
import { ActivatedRoute, ParamMap, Router } from '@angular/router';
import { Activity } from './../activity.model';

@Component({
  selector: 'app-activity-buy',
  templateUrl: './activity-buy.component.html',
  styleUrls: ['./activity-buy.component.scss']
})
export class ActivityBuyComponent implements OnInit {
  private slug: string;
  activity: Activity;

  constructor(private activityService: ActivityService, private route: ActivatedRoute, private router: Router) { }

  ngOnInit() {
    this.route.paramMap.subscribe((paramMap: ParamMap) => {
      if (paramMap.has('slug')) {
        this.slug = paramMap.get('slug');
        this.activityService.getActivityDetail(this.slug).subscribe(response => {
          this.activity = response.data;
          console.log(this.activity);
        });
      } else {
      }
    });
  }

  onBuyActivity() {
    this.activityService.buyActivity(this.activity.id);
  }

}
