import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { NgbCalendar, NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { PaymentAllUseCase } from '../../../domain/payments/usecase/payment-all.usecase';
import { ModalUsersComponent } from '../../../shared/components/modals/modal-users/modal-users.component';
import { BaseTableComponent } from '../../../shared/components/tables/base-table.component';
import { ModalPaymentsViewComponent } from '../../../shared/components/modals/modal-payments-view/modal-payments-view.component';
import { ModalPaymentsComponent } from '../../../shared/components/modals/modal-payments/modal-payments.component';

@Component({
  selector: 'app-service-maintainer',
  templateUrl: './payments-maintainer.component.html',
  styleUrls: ['./payments-maintainer.component.css']
})
export class PaymentsMaintainerComponent extends BaseTableComponent implements OnInit {

  public dataRows: any[] = [];

  constructor(
    public route: ActivatedRoute,
    private paymentAllUseCase: PaymentAllUseCase,
    public modalService: NgbModal,
    private calendar: NgbCalendar
  ) { 
    super(modalService, route);
    const that = this;
    that.modalComponent = ModalPaymentsComponent;
  }

  ngOnInit(): void {
    const that = this;
    that.dateFrom = that.calendar.getToday();
    that.dateTo = that.calendar.getToday();
    that.stateId = '0';
    that.getDataRoute();
    that.getActionStoreAndRemove();
  }

  getActionStoreAndRemove(): void {
    const that = this;
    that.currentActionStore.subscribe( res => {
      if(res === true){
        that.search();
      }
    });
    that.currentActionRemove.subscribe( res => {
      if(res){
        that.deleteRow(res);
      }
    });
  }


  search() {
    const that = this;
    // that.dateFrom = that.toModel(that.dateFrom);
    // that.dateTo = that.toModel(that.dateTo);
    that.getPaginatedRows(1);
  }

  getPaginatedRows(page: number): void {
    const that = this;
    that.loadData = true;
    that.paymentAllUseCase.execute({
      page: page,
      size: that.totalPages,
      dateFrom: that.toModel(that.dateFrom),
      dateTo: that.toModel(that.dateTo),
      stateId: that.stateId
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

  openDetail(id: string) {
    let ref = null;
    ref = this.modalService.open(ModalPaymentsViewComponent, 
      {
        ariaLabelledBy: 'modal-basic-title', 
        backdrop: 'static', 
        size: 'lg'
      }
    );

    ref.componentInstance.dataModal = {
      id: id
    };
  }

}
