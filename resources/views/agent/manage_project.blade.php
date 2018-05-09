@extends('layouts.master')
@section('script_and_style')
    <script src="{{URL::to('/js/ui-bootstrap-tpls-2.2.0.min.js')}}"></script>
    <script src="{{URL::to('js/controller/manage_project_agent.js')}}"></script>
@endsection
@section('header_title')
    Danh Sách Các Dự Án Thuộc Quyền Quản Lý
@endsection
@section('content')
    <div ng-controller="ManageProjectAgentController">
        <div class="row">
            <div class="col-md-7" style="padding: 0px;">
                <div class="form-group pull-right">
                    <div class="input-group">
                        <input class="form-control" id="text" type="text" placeholder="Search"
                               name="project_name"
                               style="width: 300px;" ng-model="project_name"
                               ng-change="onSearch()">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i
                                        class="glyphicon glyphicon-search"></i>
                            </button>
                            <input type="hidden" value="{{Session::token()}}" name="_token">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2" style="padding: 0px;">
                <form class="pull-left" role="filter" style="margin-top: 0px;">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit" ng-click="isCollapsed = !isCollapsed"><i
                                    class="glyphicon glyphicon-filter"></i></button>
                    </div>
                </form>
                <form class="pull-left" style="margin-top: 0px;padding-left: 0px;">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit" ng-click="onClear()"><i
                                    class="glyphicon glyphicon-remove"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-md-2" style="padding: 0px;">
                <form method="get" action="{{Route("getCreateProjectView")}}">
                    <button class="pull-right btn btn-success">Tạo mới</button>
                </form>
            </div>
        </div>
        <div style="margin-right:10px; margin-left: 10px">
            <div uib-collapse="isCollapsed">
                <div class="well well-lg">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="form-control-static">Ngày bắt đầu</label>
                                </div>
                                <div class="col-md-8">
                                    <p class="input-group">
                                        <input type="text" class="form-control" uib-datepicker-popup
                                               ng-model="from_date"
                                               name="from_date" is-open="popup.opened" ng-required="true"
                                               close-text="Close"/>
                                        <span class="input-group-btn">
                                    <button type="button" class="btn btn-default" ng-click="open()"><i
                                                class="glyphicon glyphicon-calendar"></i></button>
                                </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="form-control-static">Loại</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" name="type_id" ng-model="type_id"
                                            ng-options="item.name for item in typeOptions track by item.id"></select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="form-control-static">Thời gian</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" ng-model="length_id"
                                            ng-options="item.name for item in lengthOptions track by item.id"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="form-control-static">Công ty</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" name="company_id" ng-model="company_id"
                                            ng-options="item.name for item in companyOptions track by item.id"></select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary pull-right" ng-click="onSearch()">Áp
                            dụng bộ lọc
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-right:10px; margin-left: 10px">
            <div>
                <div ui-grid="gridOptions" ui-grid-pagination style="height: 500px"></div>
            </div>
        </div>
    </div>
@endsection

