@extends('Master.layout')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        لیست نقش ها
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered data-table"
                           id="data-table">
                        <thead style="background-color: #e6e6e6">
                        <tr>
                            <th style="width: 1px;text-align: center">ردیف</th>

                            <th>نقش</th>

                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <a class="btn btn-success" href="{{route('admin.role.create')}}">تعریف نقش جدید</a>
                </div>
            </div>
        </div>
    </div>
    @include('Roles.modals.modal')
    @include('Roles.scripts.script')
@endsection
