import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { DataService } from "../../../core/base/data.service";
import { ResponseDataDto } from '../../../core/base/response-data.dto';
import { CommonDto } from '../model/common.dto';

@Injectable({
    providedIn: 'root'
})
export class CommonRepository {

    private resource = 'commons/';

    constructor(private dataService: DataService){}

    getCommonRoles(): Observable<ResponseDataDto<CommonDto[]>> {
        const that = this;
        return that.dataService.get(that.resource + 'roles');
    }

    getCommonAuditStatus(): Observable<ResponseDataDto<CommonDto[]>> {
        const that = this;
        return that.dataService.get(that.resource + 'data-master/audit-status');
    }

    getCommonAuditStatusId(): Observable<ResponseDataDto<CommonDto[]>> {
        const that = this;
        return that.dataService.get(that.resource + 'data-master/audit-status-id');
    }

    getCommonBlockedUser(): Observable<ResponseDataDto<CommonDto[]>> {
        const that = this;
        return that.dataService.get(that.resource + 'data-master/blocked-user');
    }

    getCommonTypeService(): Observable<ResponseDataDto<CommonDto[]>> { 
        const that = this;
        return that.dataService.get(that.resource + 'type-services');
    }

    getCommonIsBooked(): Observable<ResponseDataDto<CommonDto[]>> { 
        const that = this;
        return that.dataService.get(that.resource + 'data-master/is-booked');
    }

    getCommonPaymentState(): Observable<ResponseDataDto<CommonDto[]>> { 
        const that = this;
        return that.dataService.get(that.resource + 'data-master/payment-state');
    }

    getCommonBanks(): Observable<ResponseDataDto<CommonDto[]>> { 
        const that = this;
        return that.dataService.get(that.resource + 'data-master/banks');
    }

    getCommonBookingState(): Observable<ResponseDataDto<CommonDto[]>> { 
        const that = this;
        return that.dataService.get(that.resource + 'data-master/booking-state');
    }

    getCommonIsVisible(): Observable<ResponseDataDto<CommonDto[]>> { 
        const that = this;
        return that.dataService.get(that.resource + 'data-master/is-visible');
    }

    getCommonPlans(): Observable<ResponseDataDto<CommonDto[]>> { 
        const that = this;
        return that.dataService.get(that.resource + 'data-master/plans');
    }


    // getCommonCategories(): Observable<ResponseDataDto<CommonDto[]>> {
    //     const that = this;
    //     return that.dataService.get(that.resource + 'categories');
    // }

    // getCommonProviders(): Observable<ResponseDataDto<CommonDto[]>> {
    //     const that = this;
    //     return that.dataService.get(that.resource + 'providers');
    // }

    // getCommonUnitMeasurement(): Observable<ResponseDataDto<CommonDto[]>> {
    //     const that = this;
    //     return that.dataService.get(that.resource + 'unit-measurement');
    // }

    // getCommonDataMasterType(): Observable<ResponseDataDto<CommonDto[]>> {
    //     const that = this;
    //     return that.dataService.get(that.resource + 'data-master-type');
    // }

    // getCommonUbigeoDepartments(): Observable<ResponseDataDto<CommonDto[]>> {
    //     const that = this;
    //     return that.dataService.get(that.resource + 'ubigeo/departments');
    // }

    // getCommonUbigeoProvinces(departmentId: string): Observable<ResponseDataDto<CommonDto[]>> {
    //     const that = this;
    //     return that.dataService.get(that.resource + 'ubigeo/departments/'+departmentId+'/provinces');
    // }

    // getCommonUbigeoDistricts(departmentId: string, provinceId: string): Observable<ResponseDataDto<CommonDto[]>> {
    //     const that = this;
    //     return that.dataService.get(that.resource + 'ubigeo/departments/'+departmentId+'/provinces/'+provinceId+'/districts');
    // }

    // getCommonDocumentTypes(): Observable<ResponseDataDto<CommonDto[]>> {
    //     const that = this;
    //     return that.dataService.get(that.resource + 'document-types');
    // }

    // getCommonTypeTaxDocument(): Observable<ResponseDataDto<CommonDto[]>> {
    //     const that = this;
    //     return that.dataService.get(that.resource + 'type-tax-document');
    // }

    // getCommonStatusPurchase(): Observable<ResponseDataDto<CommonDto[]>> {
    //     const that = this;
    //     return that.dataService.get(that.resource + 'status-purchase');
    // }
}