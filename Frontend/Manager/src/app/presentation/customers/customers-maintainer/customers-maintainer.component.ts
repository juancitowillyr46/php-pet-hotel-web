import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { CustomerAllUseCase } from '../../../domain/customers/usecase/customer-all.usecase';
// import { ModalCustomersComponent } from 'src/app/shared/components/modals/modal-customers/modal-customers.component';
import { ModalDataObservable } from 'src/app/shared/components/modals/modal-data.observable';
import { BaseTableComponent } from 'src/app/shared/components/tables/base-table.component';
import { ModalUsersComponent } from 'src/app/shared/components/modals/modal-users/modal-users.component';
import { ModalCustomersComponent } from 'src/app/shared/components/modals/modal-customers/modal-customers.component';
import { ModalCustomersViewComponent } from 'src/app/shared/components/modals/modal-customers-view/modal-customers-view.component';

@Component({
  selector: 'app-customers-maintainer',
  templateUrl: './customers-maintainer.component.html',
  styleUrls: ['./customers-maintainer.component.css']
})
export class CustomersMaintainerComponent extends BaseTableComponent implements OnInit {

  public dataRows: any[] = [];

  constructor(
    public route: ActivatedRoute,
    private customerAllUseCase: CustomerAllUseCase,
    public modalService: NgbModal
  ) { 
    super(modalService, route);
    const that = this;
    that.modalComponent = ModalCustomersComponent;
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
    that.customerAllUseCase.execute({
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

  deleteRow(id: string): void {
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

  openDetail(id: string) {
    let ref = null;
    ref = this.modalService.open(ModalCustomersViewComponent, 
      {
        ariaLabelledBy: 'modal-basic-title', 
        backdrop: 'static', 
        size: 'lg'
      }
    );
  }

}
