import { Component, OnInit } from '@angular/core';
import { BehaviorSubject, Subscription } from 'rxjs';
import { FormBuilder, Validators } from '@angular/forms';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { BaseModalComponent } from '../base-modal.component';
import { CommonAuditStatusUseCase } from '../../../../domain/commons/usecase/common-audit-status.usecase';

// import { ServiceAddUseCase } from '../../../../domain/services/usecase/service-add.usecase';
import { ServiceGetUseCase } from '../../../../domain/services/usecase/service-get.usecase';

declare var $: any;

@Component({
  selector: 'app-modal-services',
  templateUrl: './modal-services.component.html',
  styleUrls: ['./modal-services.component.css']
})
export class ModalServicesComponent extends BaseModalComponent implements OnInit {

  public modalDataSub: Subscription;
  public dataModal: any;
  public submit: any = null;
  
  constructor(
    // private serviceAddUserCase: ServiceAddUseCase,
    private serviceGetUseCase: ServiceGetUseCase,
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
      that.serviceGetUseCase.execute(that.dataModal.id).subscribe( res => {
        that.loadData = false;
        that.formGroup.patchValue(res);
        that.formGroup.enable();
        // that.onChangeProductByProvider(that.formGroup.controls.providerId.value);
        // that.getRowsOrders();
      }, (error) => {
        
      });
    }
  }

  buildingFormPurchases() {
    const that = this;
    that.formGroup = that.buildingForm({
      serviceTypeId: ['', [Validators.required]],
      name: ['', [Validators.required]],
      description: ['', [Validators.required]], 
      price: ['', [Validators.required]],
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
