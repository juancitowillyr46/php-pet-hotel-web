import { Inject, Injectable } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { NgbDateStruct, NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { BehaviorSubject } from 'rxjs';

@Injectable()
export class BaseTableComponent {

    public dateFrom: any;
    public dateTo: any;
    public stateId: any;


    // Refresh Table
    public actionStore = new BehaviorSubject<any>(null);
    public currentActionStore = this.actionStore.asObservable();

    // Remove
    public actionRemove = new BehaviorSubject<any>(null);
    public currentActionRemove = this.actionRemove.asObservable();

    // Paginate
    public totalPages: number = 10;
    public totalRows: number = 0;
    public currentPage: number = 1;
    public loadData: any;
    public data: any;
    public progress: any;

    // Modal Ref
    public modalService: NgbModal = null;
    public modalComponent: any;
    public modalRef: any;

    public route:ActivatedRoute = null;


    public displayMonths = 1;
    public navigation = 'select';
    public showWeekNumbers = false;
    public outsideDays = 'visible';

    constructor(
      @Inject(NgbModal) modalService: NgbModal,
      @Inject(ActivatedRoute) route: ActivatedRoute
    ) {
        
      const that = this;
      
      that.modalService = modalService;
      that.route = route;
      that.actionStore.next(true);
    }

    // Data de la ruta
    public getDataRoute() {
      const that = this;
      that.route.data.subscribe( res => {
        that.data = res;
      });
    }

    // Refresh Table
    public onClickRefresh(): void {
      const that = this;
      that.progress = true;
      that.actionStore.next(true);
    }

    // Modal Form
    public onClickModalStore(id: string): void {

      const that = this;

      that.modalRef = this.modalService.open(that.modalComponent, 
        {
          ariaLabelledBy: 'modal-basic-title', 
          backdrop: 'static', 
          size: 'lg'
        }
      );
      
      that.modalRef.result.then((result: any) => {
        console.log(result);
      }, (reason: any) => {
        console.log(reason);
        if(reason == 'DONE'){
          that.actionStore.next(true);
        }
      });

      that.modalRef.componentInstance.dataModal = {
        id: id
      };

    }

    // Remove Row
    public onClickRemove(id: string): void {
      const that = this;
      const success = confirm('¿Estás seguro que deseas eliminar el registro?');
      if(success){
        that.actionRemove.next(id);
      }
    }

    // Change Page
    public onClickPageChange(page: number) {
      const that = this;
      that.progress = true;
      that.currentPage = page;
      that.actionStore.next(true);
    }

    public getTodayFormatDate() {
      // JR
      var dd: any = new Date().getDate();
      var mm: any = new Date().getMonth() + 1; 
      var yyyy:any = new Date().getFullYear(); 

      if (dd < 10) { 
        dd = '0' + String(dd); 
      } 
      if (mm < 10) { 
        mm = '0' + String(mm); 
      } 
      return [{
        year: yyyy,
        month: mm,
        day: dd
      }];
    }


    public toModel(date: NgbDateStruct | null): string | null {

      var dd: any = date.day;
      var mm: any = date.month; 
      var yyyy:any = date.year; 

      if (dd < 10) { 
        dd = '0' + String(dd); 
      } 
      if (mm < 10) { 
        mm = '0' + String(mm); 
      } 

      return date ? yyyy + '-' + mm + '-' + dd : null;
    }

    
    // public fromModel(value: string | null): NgbDateStruct | null {
    //   if (value) {
    //     let date = value.split('-');
    //     return {
    //       day : parseInt(date[0], 10),
    //       month : parseInt(date[1], 10),
    //       year : parseInt(date[2], 10)
    //     };
    //   }
    //   return null;
    // }
}