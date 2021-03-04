@extends('Master.layout')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        لیست کاربران
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered data-table"
                           id="data-table">
                        <thead style="background-color: #e6e6e6">
                        <tr>
                            <th style="width: 1px;text-align: center">ردیف</th>

                            <th>نام و نام خانوادگی</th>

                            <th>نقش</th>

                            <th>نام کاربری</th>


                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <a class="btn btn-success" href="javascript:void(0)" id="createNewProduct">تعریف کاربر جدید</a>
                </div>
            </div>
        </div>
    </div>
    @include('Users.modals.modal')
    @include('Users.scripts.script')
@endsection
