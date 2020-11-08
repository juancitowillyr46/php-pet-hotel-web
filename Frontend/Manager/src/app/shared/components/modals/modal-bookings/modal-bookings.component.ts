import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { Subscription } from 'rxjs';
import { CommonAuditStatusUseCase } from 'src/app/domain/commons/usecase/common-audit-status.usecase';
import { CommonBookinStateUseCase } from 'src/app/domain/commons/usecase/common-booking-state.usecase';
import { BookingEditStateUseCase } from '../../../../domain/bookings/usecase/booking-edit-state.usecase';

import { BaseModalComponent } from '../base-modal.component';
import { BookingGetUseCase } from 'src/app/domain/bookings/usecase/booking-get.usecase';
import { CommonDto } from 'src/app/domain/commons/model/common.dto';
import { BookingStoreDto } from 'src/app/domain/bookings/model/booking-store.dto';

@Component({
  selector: 'app-modal-bookings',
  templateUrl: './modal-bookings.component.html',
  styleUrls: ['./modal-bookings.component.css']
})
export class ModalBookingsComponent extends BaseModalComponent implements OnInit {

  public modalDataSub: Subscription;
  public dataModal: any;
  public submit: any = null;
  public commonBookingState: CommonDto[] = [];

  constructor(
    public formBuilder: FormBuilder,
    public modalService: NgbModal,
    public bookingGetUseCase: BookingGetUseCase,
    public bookingEditStateUseCase: BookingEditStateUseCase,
    public commonBookinStateUseCase: CommonBookinStateUseCase,
    public commonAuditStatusUseCase: CommonAuditStatusUseCase
  ) { 
    super(formBuilder, commonAuditStatusUseCase, modalService);
    const that = this;
  }

  ngOnInit(): void {
    const that = this;
    that.loadCommon();
    that.buildingFormPurchases();
    that.getRow();
  }

  getRow() {
    const that = this;
    console.log(that.dataModal.id);
    if(that.dataModal.id != ''){
      that.loadData = true;
      that.formGroup.disable();
      that.bookingGetUseCase.execute(that.dataModal.id).subscribe( res => {
        that.loadData = false;
        that.formGroup.patchValue(res);
        that.formGroup.enable();
      }, (error) => {
        
      });
    }
  }

  buildingFormPurchases() {
    const that = this;
    that.formGroup = that.buildingForm({
      stateId: ['', [Validators.required]]
    });
  }

  onClickClose() {
    const that = this;
    that.closeModal('DONE');
  }

  onClickDone() {
    const that = this;
    
    let object: BookingStoreDto = that.formGroup.value;

    that.formGroup.disable();

    if(that.dataModal.id !== ''){
      object.id = that.dataModal.id;
      that.bookingEditStateUseCase.execute(object).subscribe( res => {
        that.submit = true;
        that.formGroup.enable();
        setTimeout(() => { 
          that.closeModal('DONE');
        }, 1000);
      }, (error) => {
        that.submit = false;
      });
    }
    //  else {
    //   that.serviceAddUseCase.execute(object).subscribe( res => {
    //     that.submit = true;
    //     that.formGroup.enable();
    //     setTimeout(() => { 
    //       that.closeModal('DONE');
    //     }, 1000);

        
    //   }, (error) => {
    //     that.submit = false;
    //   });
    // }
  }

  loadCommon(): void {
    const that = this;
    that.commonBookinStateUseCase.execute().subscribe( res => {
      that.commonBookingState = res;
    });
  }
}
