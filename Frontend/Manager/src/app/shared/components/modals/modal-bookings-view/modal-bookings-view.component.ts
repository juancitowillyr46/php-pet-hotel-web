import { Component, OnInit } from '@angular/core';
import { FormBuilder } from '@angular/forms';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { BaseModalComponent } from '../base-modal.component';
import { CommonAuditStatusUseCase } from '../../../../domain/commons/usecase/common-audit-status.usecase';
import { BookingGetUseCase } from '../../../../domain/bookings/usecase/booking-get.usecase';
import { BookingDto } from '../../../../domain/bookings/model/booking.dto';

@Component({
  selector: 'app-modal-bookings-view',
  templateUrl: './modal-bookings-view.component.html',
  styleUrls: ['./modal-bookings-view.component.css']
})
export class ModalBookingsViewComponent extends BaseModalComponent implements OnInit {

  active = 1;

  public row: BookingDto;
  
  constructor(
    private bookingGetUseCase: BookingGetUseCase,
    public formBuilder: FormBuilder,
    public modalService: NgbModal,
    public commonAuditStatusUseCase: CommonAuditStatusUseCase
  ) { 
    super(formBuilder, commonAuditStatusUseCase, modalService);
    const that = this;
  }

  ngOnInit(): void {
    const that = this;
    that.loadData = true;
    if(that.dataModal.id != ''){ 
      that.bookingGetUseCase.execute(that.dataModal.id).subscribe( res => {
        that.row = res;
        that.loadData = false;
      });
    }
    
  }

}
