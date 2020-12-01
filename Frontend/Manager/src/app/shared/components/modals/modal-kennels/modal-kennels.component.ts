import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { Subscription } from 'rxjs';
import { CommonAuditStatusUseCase } from '../../../../domain/commons/usecase/common-audit-status.usecase';
import { CommonIsBookedUseCase } from '../../../../domain/commons/usecase/common-is-booked.usecase';

import { BaseModalComponent } from '../base-modal.component';
import { KennelGetUseCase } from '../../../../domain/kennels/usecase/kennel-get.usecase';
import { KennelAddUseCase } from '../../../../domain/kennels/usecase/kennel-add.usecase';
import { KennelEditUseCase } from '../../../../domain/kennels/usecase/kennel-edit.usecase';
import { KennelRemoveUseCase } from '../../../../domain/kennels/usecase/kennel-remove.usecase';
import { KennelStoreDto } from 'src/app/domain/kennels/model/kennel-store.dto';
import { CommonDto } from 'src/app/domain/commons/model/common.dto';

@Component({
  selector: 'app-modal-kennels',
  templateUrl: './modal-kennels.component.html',
  styleUrls: ['./modal-kennels.component.css']
})
export class ModalKennelsComponent extends BaseModalComponent implements OnInit {

  public modalDataSub: Subscription;
  public dataModal: any;
  public submit: any = null;
  public commonIsBooked: CommonDto[] = []; 
  
  constructor(
    private kennelGetUseCase: KennelGetUseCase,
    private kennelAddUseCase: KennelAddUseCase,
    private kennelEditUseCase: KennelEditUseCase,
    private kennelRemoveUseCase: KennelRemoveUseCase,
    private commonIsBookedUseCase: CommonIsBookedUseCase,
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
      that.kennelGetUseCase.execute(that.dataModal.id).subscribe( res => {
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
      num: ['', [Validators.required]],
      name: ['', [Validators.required]],
      isBooked: ['', [Validators.required]],
      active: [true, [Validators.required]]
    });
  }

  onClickClose() {
    const that = this;
    that.closeModal('DONE');
  }

  onClickDone() {
    const that = this;
    
    let object: KennelStoreDto = that.formGroup.value;

    object.active = (that.formGroup.controls.active.value == 'true' || that.formGroup.controls.active.value == true)? true : false;
    //object.isBooked = (that.formGroup.controls.isBooked.value == 'true' || that.formGroup.controls.isBooked.value == true)? true : false;

    that.formGroup.disable();

    object.description = '';
    if(that.dataModal.id !== ''){
      object.id = that.dataModal.id;
      that.kennelEditUseCase.execute(object).subscribe( res => {
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
      that.kennelAddUseCase.execute(object).subscribe( res => {
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
    that.commonIsBookedUseCase.execute().subscribe( res => {
      that.commonIsBooked = res;
    });
  }
  
}
