import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, ParamMap, Router } from '@angular/router';

@Component({
  selector: 'app-register-complete',
  templateUrl: './register-complete.component.html',
  styleUrls: ['./register-complete.component.scss']
})
export class RegisterCompleteComponent implements OnInit {

  constructor(private route: ActivatedRoute, private router: Router) { }

  ngOnInit() {
    this.route.paramMap.subscribe((paramMap: ParamMap) => {
      if (paramMap.has('status')) {
        if (paramMap.get('status') === 'completed') {
          console.log(paramMap.get('status'));
        } else {
          this.router.navigate(['/']);
        }
      } else {
          this.router.navigate(['/']);
      }
    });


  }

}
