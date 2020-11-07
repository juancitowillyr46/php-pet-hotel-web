import { Component, OnInit } from '@angular/core';
import { FormBuilder } from '@angular/forms';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { CommonAuditStatusUseCase } from 'src/app/domain/commons/usecase/common-audit-status.usecase';
import { CustomerDto } from 'src/app/domain/customers/model/customer.dto';
import { PaymentDto } from 'src/app/domain/payments/model/payment.dto';
import { PaymentGetUseCase } from '../../../../domain/payments/usecase/payment-get.usecase';

import { BaseModalComponent } from '../base-modal.component';

@Component({
  selector: 'app-modal-payments-view',
  templateUrl: './modal-payments-view.component.html',
  styleUrls: ['./modal-payments-view.component.css']
})
export class ModalPaymentsViewComponent extends BaseModalComponent implements OnInit {

  public row: PaymentDto;

  public dataModal: any;

  constructor(
    private paymentGetUseCase: PaymentGetUseCase,
    public formBuilder: FormBuilder,
    public modalService: NgbModal,
    public commonAuditStatusUseCase: CommonAuditStatusUseCase
  ) { 
    super(formBuilder, commonAuditStatusUseCase, modalService);
    const that = this;
  }

  ngOnInit(): void {
    const that = this;
    if(that.dataModal.id != ''){
      that.paymentGetUseCase.execute(that.dataModal.id).subscribe(res => {
        //console.log(res);
        that.row = res;
      });
    } 
  }


}
