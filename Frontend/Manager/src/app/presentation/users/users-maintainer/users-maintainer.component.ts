import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { UserAllUseCase } from '../../../domain/users/usecase/user-all.usecase';
import { ModalDataObservable } from 'src/app/shared/components/modals/modal-data.observable';
import { ModalUsersComponent } from 'src/app/shared/components/modals/modal-users/modal-users.component';
import { BaseTableComponent } from 'src/app/shared/components/tables/base-table.component';

@Component({
  selector: 'app-users-maintainer',
  templateUrl: './users-maintainer.component.html',
  styleUrls: ['./users-maintainer.component.css']
})
export class UsersMaintainerComponent extends BaseTableComponent implements OnInit {

  public dataRows: any[] = [];

  constructor(
    public route: ActivatedRoute,
    private userAllUseCase: UserAllUseCase,
    public modalService: NgbModal
  ) { 
    super(modalService, route);
    const that = this;
    that.modalComponent = ModalUsersComponent;
  }

  ngOnInit(): void {
    const that = this;
    that.getDataRoute();
    that.getActionStoreAndRemove();
  }

  getActionStoreAndRemove(): void {
    const that = this;
    that.currentActionStore.subscribe( res => {
      if(res === true){
        that.getPaginatedRows(that.currentPage);
      }
    });
    that.currentActionRemove.subscribe( res => {
      if(res){
        that.deleteRow(res);
      }
    });
  }


  getPaginatedRows(page: number): void {
    const that = this;
    that.loadData = true;
    that.userAllUseCase.execute({
      page: page,
      size: that.totalPages
    }).subscribe(res => {
      that.loadData = false;
      that.dataRows = res.data.rows;
      that.currentPage = page;
      that.totalRows = res.data.totalRows;
      that.actionStore.next(null);
    }, (error) => {
      that.loadData = false;
    });
  }

  deleteRow(idPurchase: string): void {
    const that = this;
    that.loadData = true;
    // that.purchaseRemoveUseCase.execute(idPurchase).subscribe( res => {
    //   that.loadData = false;
    //   that.actionRemove.next(null);
    //   that.getPaginatedRows(that.currentPage);
    // }, (error) => {
    //   that.loadData = false;
    // });
  }

}
