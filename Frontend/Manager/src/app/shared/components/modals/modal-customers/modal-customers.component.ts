import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { Subscription } from 'rxjs';
import { CommonAuditStatusUseCase } from 'src/app/domain/commons/usecase/common-audit-status.usecase';
import { BaseModalComponent } from '../base-modal.component';

@Component({
  selector: 'app-modal-customers',
  templateUrl: './modal-customers.component.html',
  styleUrls: ['./modal-customers.component.css']
})
export class ModalCustomersComponent extends BaseModalComponent implements OnInit {

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
      firstName: ['', [Validators.required]],
      lastName: ['', [Validators.required]],
      phone: ['', [Validators.required]],
      address: ['', [Validators.required]], 
      addressOptional: ['', [Validators.required]],
      comments: ['', [Validators.required]],
      image: ['', [Validators.required]],
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
