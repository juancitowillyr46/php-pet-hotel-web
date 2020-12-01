import { Component, OnInit } from '@angular/core';
import { Subscription } from 'rxjs';
import { CommonRolesUseCase } from 'src/app/domain/commons/usecase/common-roles.usecase';
import { CommonAuditStatusUseCase } from 'src/app/domain/commons/usecase/common-audit-status.usecase';
import { CommonBlockedUserUseCase } from 'src/app/domain/commons/usecase/common-blocked-user.usecase';
import { CommonDto } from '../../../../domain/commons/model/common.dto';
declare var $: any;
import { GridSimpleService } from '../../grid-simple/grid-simple.service';
import { ModalDataObservable } from '../modal-data.observable';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

import { UserGetUseCase } from '../../../../domain/users/usecase/user-get.usecase';
import { UserAddUseCase } from '../../../../domain/users/usecase/user-add.usercase';
import { UserEditUseCase } from '../../../../domain/users/usecase/user-edit.usecase';
import { UserEditPasswordUseCase } from '../../../../domain/users/usecase/user-edit-password.usecase';
import { UserRemoveUseCase } from '../../../../domain/users/usecase/user-remove.usecase';

import { BaseModalComponent } from '../base-modal.component';
import { UserStoreDto } from 'src/app/domain/users/model/user-store.dto';
import { ModalDataRemoveObservable } from '../modal-data-remove.observable';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { UserDto } from 'src/app/domain/users/model/user.dto';

@Component({
  selector: 'app-modal-users',
  templateUrl: './modal-users.component.html',
  styleUrls: ['./modal-users.component.css']
})
export class ModalUsersComponent extends BaseModalComponent implements OnInit  {

  public modalDataSub: Subscription;
  public dataModal: any;
  public submit: any = null;

  public commonRoles: CommonDto[] = [];
  public commonBlockedUser: CommonDto[] = [];
  public password: string = '';

  public dataDto: UserDto;

  constructor(
    private commonRolesUseCase: CommonRolesUseCase,
    private commonBlockedUserUseCase: CommonBlockedUserUseCase,
    private userGetUseCase: UserGetUseCase,
    private userEditPasswordUseCase: UserEditPasswordUseCase,
    private userAddUseCase: UserAddUseCase,
    private userEditUseCase: UserEditUseCase,
    private userRemoveUserCase: UserRemoveUseCase,
    public commonAuditStatusUseCase: CommonAuditStatusUseCase,
    public formBuilder: FormBuilder,
    public modalService: NgbModal
  ) { 
    super(formBuilder, commonAuditStatusUseCase, modalService);
    const that = this;
  }

  ngOnInit(): void {
    const that = this;

    that.loadCommonUser();
    that.buildingFormUser();
    that.getRow();
  }

  getRow() {
    const that = this;
    if(that.dataModal.id != ''){
      that.loadData = true;
      that.formGroup.disable();
      that.userGetUseCase.execute(that.dataModal.id).subscribe( res => {
        that.loadData = false;
        that.dataDto = res;
        that.formGroup.patchValue(res);
        that.formGroup.enable();
      }, (error) => {
        
      });
    }
  }

  loadCommonUser(): void {
    const that = this;
    that.commonRolesUseCase.execute().subscribe( res => {
      that.commonRoles = res;
    });
    that.commonBlockedUserUseCase.execute().subscribe( res => {
      that.commonBlockedUser = res;
    });
  }

  buildingFormUser(): void {
    const that = this;
    that.formGroup = that.buildingForm({
      username: ['', [Validators.required]],
      roleId: ['', [Validators.required]],
      blocked : [false, [Validators.required]],
      active: [true, [Validators.required]],
    });
  }

  

  onClickClose() {
    const that = this;
    that.closeModal('DONE');
  }

  onClickDone() {
    const that = this;
    
    let object: UserStoreDto = that.formGroup.value;

    object.active = (that.formGroup.controls.active.value == 'true' || that.formGroup.controls.active.value == true)? true : false;
    // object.blocked = (that.formGroup.controls.blocked.value == 'true' || that.formGroup.controls.blocked.value == true)? true : false;

    that.formGroup.disable();

    if(that.dataModal.id !== ''){

      object.id = that.dataModal.id;
      object.email = object.username;

      that.userEditUseCase.execute(object).subscribe( res => {
        that.submit = true;
        that.formGroup.enable();
        setTimeout(() => {
          that.closeModal('DONE');
        }, 1000);
        
      });
    }
    //  else {
    //   that.userAddUseCase.execute(object).subscribe( res => {
    //     that.submit = true;
    //     that.formGroup.enable();
    //     that.storeOrders(res.id);
    //   });
    // }

  }

  onClickChangePassword() {
    const that = this;
    
    let object: UserStoreDto = that.formGroup.value;
    object.id = that.dataModal.id;
    object.password = that.password;

    that.userEditPasswordUseCase.execute({
      id: that.dataModal.id,
      password: that.password
    }).subscribe( res => {
      that.submit = true;
      that.formGroup.enable();
      setTimeout(() => {
        that.closeModal('DONE');
        alert('Clave cambiada correctamente');
      }, 1000);
    });
  }

}
