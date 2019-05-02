import { Component, OnInit } from '@angular/core';
import { PromotionService } from '../promotion.service';
import { ActivatedRoute, Router, ParamMap } from '@angular/router';
import { Subscription } from 'rxjs';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { BankService } from './../../../servicrs/bank.service';
import { Bank } from './../../../models/bank.model';
import { mimeType } from './mime-type.validator';

@Component({
  selector: 'app-promotion-order-detail',
  templateUrl: './promotion-order-detail.component.html',
  styleUrls: ['./promotion-order-detail.component.scss']
})
export class PromotionOrderDetailComponent implements OnInit {
  private id: string;
  order: any;
  form: FormGroup;
  promotion: any;
  banks: Bank[] = [];
  hour: Array<any> = [];
  minute: Array<any> = [];
  imagePreview: any;
  selectFile: any;
  private orderSub: Subscription;

  constructor(
    private promotionService: PromotionService,
    private bankService: BankService,
    private route: ActivatedRoute,
    private routerL: Router
  ) { }

  ngOnInit() {
    this.form = new FormGroup({
      bank_id: new FormControl(null, {
        validators: [Validators.required, Validators.minLength(3)]
      }),
      payment_date: new FormControl(null, { validators: [Validators.required] }),
      payment_hour: new FormControl(null, { validators: [Validators.required] }),
      payment_minute: new FormControl(null, { validators: [Validators.required] }),
      payment_amount: new FormControl(null, { validators: [Validators.required] }),
      image: new FormControl(null, {
        validators: [Validators.required],
        asyncValidators: [mimeType]
      })
    });

    for (let i = 0; i < 24; i++) {
      let num: any;
      if (i < 10) {
        num = '0' + i;
      } else {
        num = ''+i;
      }
      this.hour.push(num);
    }

    for (let i = 0; i < 60; i++) {
      let num: any;
      if (i < 10) {
        num = '0' + i;
      } else {
        num = ''+i;
      }
      this.minute.push(num);
    }

    this.route.paramMap.subscribe((paramMap: ParamMap) => {
      if (paramMap.has('id')) {
        this.id = paramMap.get('id');
        console.log(this.id);
      } else {
        // this.router.navigate(['/activity']);
      }
    });

    this.promotionService.getOrder(this.id);
    this.orderSub = this.promotionService.getOrderUpdateListener()
      .subscribe((order: any) => {
        this.order = order;
        this.promotion = order.promotion.data;
    });

    this.bankService.getBanks()
      .subscribe(response => {
      this.banks = response.data;
      console.log(this.banks);
    });

  }

  onImagePicked(event: Event) {
    const file = (event.target as HTMLInputElement).files[0];
    this.form.patchValue({ image: file });
    this.form.get('image').updateValueAndValidity();
    const reader = new FileReader();
    reader.onload = () => {
      this.imagePreview = reader.result;
      this.selectFile = reader.result;
    };
    reader.readAsDataURL(file);
  }

  onPayment() {
    if (this.form.invalid) {
      return;
    }
    const time = this.form.value.payment_hour + ':' + this.form.value.payment_minute;
    console.log(time);
    this.promotionService.updatePayment(
      this.order.id,
      this.form.value.bank_id,
      this.form.value.payment_date,
      time,
      this.form.value.payment_amount,
      this.selectFile
    );
    // this.form.reset();
  }

}
