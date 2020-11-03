import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { PetAllUseCase } from '../../../domain/pets/usecase/pet-all.usecase';
import { ModalPetsComponent } from '../../../shared/components/modals/modal-pets/modal-pets.component';
// import { ModalPetsComponent } from '../../../shared/components/modals/modal-pets/modal-pets.component';
import { BaseTableComponent } from '../../../shared/components/tables/base-table.component';

@Component({
  selector: 'app-Pets-maintainer',
  templateUrl: './Pets-maintainer.component.html',
  styleUrls: ['./Pets-maintainer.component.css']
})
export class PetsMaintainerComponent extends BaseTableComponent implements OnInit {

  public dataRows: any[] = [];

  constructor(
    public route: ActivatedRoute,
    private petAllUseCase: PetAllUseCase,
    public modalService: NgbModal
  ) { 
    super(modalService, route);
    const that = this;
    that.modalComponent = ModalPetsComponent;
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
    that.petAllUseCase.execute({
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
