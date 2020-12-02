import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { PaymentAllUseCase } from 'src/app/domain/payments/usecase/payment-all.usecase';
import { ModalPaymentsComponent } from 'src/app/shared/components/modals/modal-payments/modal-payments.component';
import { BaseTableComponent } from 'src/app/shared/components/tables/base-table.component';

@Component({
  selector: 'app-payments-services',
  templateUrl: './payments-services.component.html',
  styleUrls: ['./payments-services.component.css']
})
export class PaymentsServicesComponent  extends BaseTableComponent implements OnInit {

  public dataRows: any[] = [];

  constructor(
    public route: ActivatedRoute,
    private paymentAllUseCase: PaymentAllUseCase,
    public modalService: NgbModal
  ) { 
    super(modalService, route);
    const that = this;
    that.modalComponent = ModalPaymentsComponent;
  }
  ngOnInit(): void {
    const that = this;
    that.getDataRoute();
  }

  openDetail(id: string) {
    // let ref = null;
    // ref = this.modalService.open(ModalPaymentsViewComponent, 
    //   {
    //     ariaLabelledBy: 'modal-basic-title', 
    //     backdrop: 'static', 
    //     size: 'lg'
    //   }
    // );

    // ref.componentInstance.dataModal = {
    //   id: id
    // };
  }

}
