import { Component, OnInit, OnDestroy } from '@angular/core';
import { ActivityService } from '../activity.service';
import { ActivatedRoute , ParamMap, Router } from '@angular/router';
import { Activity } from './../activity.model';
import { Subscription } from 'rxjs';
import { AuthService } from './../../../auth/auth.service';

@Component({
  selector: 'app-activity-detail',
  templateUrl: './activity-detail.component.html',
  styleUrls: ['./activity-detail.component.scss']
})
export class ActivityDetailComponent implements OnInit, OnDestroy {
  userIsAuthenticated = false;
  private authListenerSubs: Subscription;
  private slug: string;
  activity: Activity;


  constructor(
    private activityService: ActivityService,
    private route: ActivatedRoute,
    private authService: AuthService,
    private router: Router
  ) { }

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

    this.userIsAuthenticated = this.authService.getIsAuth();
    this.authListenerSubs = this.authService.getAuthStatusListerner()
      .subscribe(isAuthenticated => {
      this.userIsAuthenticated = isAuthenticated;
    });
  }

  onBuyActivity() {
    this.router.navigate(['/activity/buy/' + this.activity.act_slug]);
  }

  ngOnDestroy() {
    this.authListenerSubs.unsubscribe();
  }

}
