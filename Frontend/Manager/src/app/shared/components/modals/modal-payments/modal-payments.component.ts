import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { Subscription } from 'rxjs';
import { CommonDto } from 'src/app/domain/commons/model/common.dto';
import { CommonAuditStatusUseCase } from '../../../../domain/commons/usecase/common-audit-status.usecase';
import { CommonPaymentStateUseCase } from '../../../../domain/commons/usecase/common-payment-state.usecase';
import { CommonBanksUseCase } from '../../../../domain/commons/usecase/common-banks.usecase';

import { PaymentGetUseCase } from '../../../../domain/payments/usecase/payment-get.usecase';
import { PaymentEditStateUseCase } from '../../../../domain/payments/usecase/payment-edit-state.usecase';

import { PaymentStateStoreDto } from '../../../../domain/payments/model/payment-store-state.dto';
import { BaseModalComponent } from '../base-modal.component';
import { PaymentDto } from 'src/app/domain/payments/model/payment.dto';

@Component({
  selector: 'app-modal-payments',
  templateUrl: './modal-payments.component.html',
  styleUrls: ['./modal-payments.component.css']
})
export class ModalPaymentsComponent  extends BaseModalComponent implements OnInit {

  public modalDataSub: Subscription;
  public dataModal: any;
  public submit: any = null;
  public commonPaymentState: CommonDto[] = []; 
  public commonBanks: CommonDto[] = [];
  public paymentDto: PaymentDto;

  constructor(
    public formBuilder: FormBuilder,
    public modalService: NgbModal,
    private commonBanksUseCase: CommonBanksUseCase,
    private paymentGetUseCase: PaymentGetUseCase,
    private paymentEditStateUseCase: PaymentEditStateUseCase,
    private commonPaymentStateUseCase: CommonPaymentStateUseCase,
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
      that.paymentGetUseCase.execute(that.dataModal.id).subscribe( res => {
        that.loadData = false;
        that.paymentDto = res;
        that.formGroup.patchValue(res);
        that.formGroup.enable();
      }, (error) => {
        
      });
    }
  }

  buildingFormPurchases() {
    const that = this;
    that.formGroup = that.buildingForm({
      stateId: ['', [Validators.required]],
      bankId: ['']
    });
  }

  onClickClose() {
    const that = this;
    that.closeModal('DONE');
  }

  onClickDone() {
    const that = this;
    
    let object: PaymentStateStoreDto = that.formGroup.value;

    that.formGroup.disable();

    if(that.dataModal.id !== ''){
      object.id = that.dataModal.id;
      that.paymentEditStateUseCase.execute(object).subscribe( res => {
        that.submit = true;
        that.formGroup.enable();
        setTimeout(() => { 
          that.closeModal('DONE');
        }, 1000);
      }, (error) => {
        that.submit = false;
      });
    }
  }

  loadCommon(): void {
    const that = this;
    that.commonPaymentStateUseCase.execute().subscribe( res => {
      that.commonPaymentState = res;
    });
    that.commonBanksUseCase.execute().subscribe( res => {
      that.commonBanks = res;
    });
  }

}
