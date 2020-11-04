import { Component, OnInit } from '@angular/core';
import { FormBuilder } from '@angular/forms';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { BaseModalComponent } from '../base-modal.component';
import { CommonAuditStatusUseCase } from '../../../../domain/commons/usecase/common-audit-status.usecase';
import { CustomerGetUseCase } from 'src/app/domain/customers/usecase/customer-get.usecase';
import { CustomerDto } from 'src/app/domain/customers/model/customer.dto';

@Component({
  selector: 'app-modal-customers-view',
  templateUrl: './modal-customers-view.component.html',
  styleUrls: ['./modal-customers-view.component.css']
})
export class ModalCustomersViewComponent extends BaseModalComponent implements OnInit {

  active = 1;

  public row: CustomerDto;
  
  constructor(
    private customerGetUseCase: CustomerGetUseCase,
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
    that.customerGetUseCase.execute('0bd8324c-1979-11eb-a399-50e549398ade').subscribe( res => {
      that.row = res;
      that.loadData = false;
    });
  }

}
