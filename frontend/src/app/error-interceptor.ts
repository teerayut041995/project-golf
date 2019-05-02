import {
  HttpInterceptor,
  HttpRequest,
  HttpHandler,
  HttpErrorResponse
} from '@angular/common/http';
import { catchError } from 'rxjs/operators';
import { throwError } from 'rxjs';
import { Injectable } from '@angular/core';

import { ErrorComponent } from "./error/error.component";
import { ErrorService } from './error/error.service';

@Injectable()

export class ErrorInterceptor implements HttpInterceptor {

  constructor(private errorService: ErrorService) {}

  intercept(req: HttpRequest<any>, next: HttpHandler) {
    return next.handle(req).pipe(
      catchError((error: HttpErrorResponse) => {
        let errorMessage = 'An unknown error occurred!';
        if (error.error.error) {
          errorMessage = error.error.error;
        }
        this.errorService.throwError(errorMessage);
        return throwError(error);
      })
    );
  }
}
