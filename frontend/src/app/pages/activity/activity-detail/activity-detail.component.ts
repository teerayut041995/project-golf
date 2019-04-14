import { Component, OnInit } from '@angular/core';
import { ActivityService } from '../activity.service';
import { ActivatedRoute , ParamMap } from '@angular/router';
import { Activity } from './../activity.model';

@Component({
  selector: 'app-activity-detail',
  templateUrl: './activity-detail.component.html',
  styleUrls: ['./activity-detail.component.scss']
})
export class ActivityDetailComponent implements OnInit {
  private slug: string;
  activity: Activity;

  constructor(private activityService: ActivityService, private route: ActivatedRoute) { }

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

}
