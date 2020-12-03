import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { NgbCalendar, NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { BookingAllUseCase } from '../../../domain/bookings/usecase/booking-all.usecase';
// import { ModalBookingsComponent } from 'src/app/shared/components/modals/modal-bookings/modal-bookings.component';
import { ModalDataObservable } from 'src/app/shared/components/modals/modal-data.observable';
import { BaseTableComponent } from 'src/app/shared/components/tables/base-table.component';
import { ModalUsersComponent } from 'src/app/shared/components/modals/modal-users/modal-users.component';
import { ModalBookingsComponent } from '../../../shared/components/modals/modal-bookings/modal-bookings.component';
import { ModalBookingsViewComponent } from 'src/app/shared/components/modals/modal-bookings-view/modal-bookings-view.component';

@Component({
  selector: 'app-bookings-maintainer',
  templateUrl: './bookings-maintainer.component.html',
  styleUrls: ['./bookings-maintainer.component.css']
})
export class BookingsMaintainerComponent extends BaseTableComponent implements OnInit {

  public dataRows: any[] = [];
  public isDoggySchool: any = false;

  constructor(
    public route: ActivatedRoute,
    private bookingAllUseCase: BookingAllUseCase,
    public modalService: NgbModal,
    private calendar: NgbCalendar
  ) { 
    super(modalService, route);
    const that = this;
    that.modalComponent = ModalBookingsComponent;
  }

  ngOnInit(): void {
    const that = this;
    that.dateFrom = that.calendar.getToday();
    that.dateTo = that.calendar.getToday();
    that.stateId = '0';
    that.isDoggySchool = false;
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

  search() {
    const that = this;
    // that.dateFrom = that.toModel(that.dateFrom);
    // that.dateTo = that.toModel(that.dateTo);
    that.getPaginatedRows(1);
  }

  getPaginatedRows(page: number): void {
    const that = this;
    that.loadData = true;
    that.bookingAllUseCase.execute({
      page: page,
      size: that.totalPages,
      dateFrom: that.toModel(that.dateFrom),
      dateTo: that.toModel(that.dateTo),
      stateId: that.stateId,
      isDoggySchool: that.isDoggySchool
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
    ref = this.modalService.open(ModalBookingsViewComponent, 
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
