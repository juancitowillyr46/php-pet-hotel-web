import { Component, OnInit } from '@angular/core';
import { FormBuilder } from '@angular/forms';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { CommonAuditStatusUseCase } from 'src/app/domain/commons/usecase/common-audit-status.usecase';
import { BaseModalComponent } from '../base-modal.component';

@Component({
  selector: 'app-modal-payments-view',
  templateUrl: './modal-payments-view.component.html',
  styleUrls: ['./modal-payments-view.component.css']
})
export class ModalPaymentsViewComponent extends BaseModalComponent implements OnInit {

  constructor(
    public formBuilder: FormBuilder,
    public modalService: NgbModal,
    public commonAuditStatusUseCase: CommonAuditStatusUseCase
  ) { 
    super(formBuilder, commonAuditStatusUseCase, modalService);
    const that = this;
  }

  ngOnInit(): void {
  }


}
