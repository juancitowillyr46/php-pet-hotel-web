import { Component, OnInit } from '@angular/core';
import { BehaviorSubject, Subscription } from 'rxjs';
import { FormBuilder, Validators } from '@angular/forms';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { BaseModalComponent } from '../base-modal.component';
import { CommonAuditStatusUseCase } from '../../../../domain/commons/usecase/common-audit-status.usecase';

import { ServiceAddUseCase } from '../../../../domain/services/usecase/service-add.usecase';
import { ServiceEditUseCase } from '../../../../domain/services/usecase/service-edit.usecase';
import { ServiceGetUseCase } from '../../../../domain/services/usecase/service-get.usecase';
import { CommonTypeServiceUseCase } from '../../../../domain/commons/usecase/common-type-service.usecase';
import { CommonDto } from 'src/app/domain/commons/model/common.dto';
import { ServiceStoreDto } from 'src/app/domain/services/model/service-store.dto';


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
  public commonTypeService: CommonDto[] = [];
  
  constructor(
    private commonTypeServiceUseCase: CommonTypeServiceUseCase,
    private serviceGetUseCase: ServiceGetUseCase,
    private serviceAddUseCase: ServiceAddUseCase,
    private serviceEditUseCase: ServiceEditUseCase,
    public formBuilder: FormBuilder,
    public modalService: NgbModal,
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
      that.serviceGetUseCase.execute(that.dataModal.id).subscribe( res => {
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
      serviceTypeId: ['', [Validators.required]],
      name: ['', [Validators.required]],
      description: ['', [Validators.required]], 
      price: [0, [Validators.required]],
      active: [true, [Validators.required]]
    });
  }

  onClickClose() {
    const that = this;
    that.closeModal('DONE');
  }

  onClickDone() {
    const that = this;
    
    let object: ServiceStoreDto = that.formGroup.value;

    object.active = (that.formGroup.controls.active.value == 'true' || that.formGroup.controls.active.value == true)? true : false;
    object.main = false;
    object.image = '';

    that.formGroup.disable();

    if(that.dataModal.id !== ''){
      object.id = that.dataModal.id;
      that.serviceEditUseCase.execute(object).subscribe( res => {
        that.submit = true;
        that.formGroup.enable();
        setTimeout(() => { 
          that.closeModal('DONE');
        }, 1000);
      }, (error) => {
        that.submit = false;
      });
    }
     else {
      that.serviceAddUseCase.execute(object).subscribe( res => {
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
    that.commonTypeServiceUseCase.execute().subscribe( res => {
      that.commonTypeService = res;
    });
  }

}
