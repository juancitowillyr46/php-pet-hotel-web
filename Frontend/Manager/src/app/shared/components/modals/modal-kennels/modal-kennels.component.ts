import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { Subscription } from 'rxjs';
import { CommonAuditStatusUseCase } from '../../../../domain/commons/usecase/common-audit-status.usecase';
import { BaseModalComponent } from '../base-modal.component';

@Component({
  selector: 'app-modal-kennels',
  templateUrl: './modal-kennels.component.html',
  styleUrls: ['./modal-kennels.component.css']
})
export class ModalKennelsComponent extends BaseModalComponent implements OnInit {

  public modalDataSub: Subscription;
  public dataModal: any;
  public submit: any = null;
  
  constructor(
    public formBuilder: FormBuilder,
    public modalService: NgbModal,
    public commonAuditStatusUseCase: CommonAuditStatusUseCase
  ) { 
    super(formBuilder, commonAuditStatusUseCase, modalService);
    const that = this;
  }

  ngOnInit(): void {
    const that = this;
    that.buildingFormPurchases();
    that.getRow();
  }

  getRow() {
    const that = this;
    console.log(that.dataModal.id);
    if(that.dataModal.id != ''){
      that.loadData = true;
      that.formGroup.disable();
      // that.serviceGetUseCase.execute(that.dataModal.id).subscribe( res => {
      //   that.loadData = false;
      //   that.formGroup.patchValue(res);
      //   that.formGroup.enable();
      //   // that.onChangeProductByProvider(that.formGroup.controls.providerId.value);
      //   // that.getRowsOrders();
      // }, (error) => {
        
      // });
    }
  }

  buildingFormPurchases() {
    const that = this;
    that.formGroup = that.buildingForm({
      num: ['', [Validators.required]],
      name: ['', [Validators.required]],
      isBooked: [true, [Validators.required]],
      active: [true, [Validators.required]]
    });
  }

  onClickClose() {
    const that = this;
    that.closeModal('DONE');
  }

  onClickDone() {
  }
  
}
