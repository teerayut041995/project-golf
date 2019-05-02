import { Component, OnInit, OnDestroy, ViewChild, AfterViewInit } from "@angular/core";
import { Subscription } from "rxjs";
import { ModalDirective } from 'angular-bootstrap-md';
import { ErrorService } from "./error.service";

@Component({
  templateUrl: "./error.component.html",
  selector: "app-error",
  // styleUrls: ["./error.component.css"]
})
export class ErrorComponent implements OnInit, OnDestroy {
  @ViewChild('basicModal') basicModal: ModalDirective;

  data: { message: string };
  private errorSub: Subscription;

  // constructor(@Inject(MAT_DIALOG_DATA) public data: { message: string }) {}
  constructor(private errorService: ErrorService) {}

  ngOnInit() {
    this.errorSub = this.errorService.getErrorListener().subscribe(message => {
      this.data = { message: message };
      console.log(this.data);
      this.basicModal.show();
    });
  }

  onHandleError() {
    this.errorService.handleError();
  }

  ngOnDestroy() {
    // this.errorSub.unsubscribe();
  }
}
