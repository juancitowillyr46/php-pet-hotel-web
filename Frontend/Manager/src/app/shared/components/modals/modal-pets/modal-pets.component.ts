import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { Subscription } from 'rxjs';
import { BaseModalComponent } from '../base-modal.component';
import { CommonAuditStatusUseCase } from '../../../../domain/commons/usecase/common-audit-status.usecase';

@Component({
  selector: 'app-modal-pets',
  templateUrl: './modal-pets.component.html',
  styleUrls: ['./modal-pets.component.css']
})
export class ModalPetsComponent extends BaseModalComponent implements OnInit {

  public modalDataSub: Subscription;
  public dataModal: any;
  public submit: any = null;
  
  constructor(
    // private serviceAddUserCase: ServiceAddUseCase,
    //private serviceGetUseCase: ServiceGetUseCase,
    public formBuilder: FormBuilder,
    public modalService: NgbModal,
    public commonAuditStatusUseCase: CommonAuditStatusUseCase
  ) { 
    super(formBuilder, commonAuditStatusUseCase, modalService);
    const that = this;
  }
  
  ngOnInit(): void {
    const that = this;
    that.buildingFormPets();
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

  buildingFormPets() {
    const that = this;
    that.formGroup = that.buildingForm({
      name: ['', [Validators.required]],
      age: ['', [Validators.required]],
      gender: ['', [Validators.required]],
      race: ['', [Validators.required]],
      weight: ['', [Validators.required]], 
      size: ['', [Validators.required]], 
      diseases: ['', [Validators.required]],
      veterinary: ['', [Validators.required]],
      veterinary_phone: ['', [Validators.required]],
      treatments: ['', [Validators.required]],
      last_vaccine: ['', [Validators.required]],
      is_agressive: [true, [Validators.required]],
      observation: ['', [Validators.required]],
      last_zeal: ['', [Validators.required]],
      other: ['', [Validators.required]],
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
