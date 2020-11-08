import { AfterViewInit, Component, OnInit } from '@angular/core';
import { InitFunctionJsService } from 'src/app/shared/services/init-function-js.service';

@Component({
  selector: 'app-bookings',
  templateUrl: './bookings.component.html',
  styleUrls: ['./bookings.component.css']
})
export class BookingsComponent implements OnInit, AfterViewInit {

  constructor(
    private initFunctionJsService: InitFunctionJsService
  ) { }

  ngOnInit(): void {
  }

  ngAfterViewInit(): void {
    const that = this;
    that.initFunctionJsService.executeFunction();
  }

}
