import { Component, OnInit } from '@angular/core';
import { FormBuilder } from '@angular/forms';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { BaseModalComponent } from '../base-modal.component';
import { CommonAuditStatusUseCase } from '../../../../domain/commons/usecase/common-audit-status.usecase';

@Component({
  selector: 'app-modal-customers-view',
  templateUrl: './modal-customers-view.component.html',
  styleUrls: ['./modal-customers-view.component.css']
})
export class ModalCustomersViewComponent extends BaseModalComponent implements OnInit {

  active = 1;
  
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
