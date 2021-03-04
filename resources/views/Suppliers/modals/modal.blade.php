<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog col-md-12">
        <div class="modal-body col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption" id="caption">

                    </div>
                    <div class="caption pull-left">
                        <a data-dismiss="modal">
                            <i style="color: white" class="pull-left fa fa-closee"></i>
                        </a>
                    </div>

                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form autocomplete="off" id="productForm" name="productForm">

                                <input type="hidden" id="id" name="id">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table table-responsive">
                                            <table
                                                class="table table-responsive table-striped table-bordered">
                                                <thead style="background-color: #e6e6e6">
                                                <tr>
                                                    <td style="text-align: center">محصول</td>
                                                    <td style="text-align: center">برند</td>
                                                    <td style="text-align: center" width="15%">تعداد</td>
                                                    <td style="text-align: center" width="15%">عملیات</td>
                                                </tr>
                                                </thead>
                                                <tbody
                                                    id="TextBoxContainerbank">

                                                <tr>
                                                    <td id="product_title"></td>
                                                    <td id="brand_title"></td>
                                                    <td id="number_title"></td>
                                                    <td id="action"></td>
                                                </tr>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th colspan="1">
                                                        <button id="btnAddbank"
                                                                type="button"
                                                                onclick="addInput12()"
                                                                class="btn btn-primary"
                                                                data-toggle="tooltip">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </th>
                                                </tr>
                                                </tfoot>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <hr/>
                                <div class="modal-footer">
                                    <div class="text-left">


                                        <button style="width: 130px" type="submit" class="btn btn-success"
                                                id="saveBtnorder" value="ثبـــــــت">
                                            ثبت
                                        </button>

                                        <button style="width: 130px" type="button" class="btn btn-danger"
                                                data-dismiss="modal">
                                            انصراف
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="ajaxModelDetailOrder" aria-hidden="true">
    <div class="modal-dialog col-md-12">
        <div class="modal-body col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption" id="caption">
                        جزییات سفارش
                    </div>
                    <div class="caption pull-left">
                        <a data-dismiss="modal">
                            <i style="color: white" class="pull-left fa fa-closee"></i>
                        </a>
                    </div>

                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form autocomplete="off" id="productForm" name="productForm">

                                <input type="hidden" id="id" name="id">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">

                                        <table class="table table-striped table-bordered detail_data"
                                               id="detail_data">
                                            <thead style="background-color: #e6e6e6">
                                            <tr>
                                                <th style="width: 1px;text-align: center">ردیف</th>

                                                <th>محصول</th>

                                                <th>برند</th>

                                                <th>تعداد</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                                <br/>
                                <hr/>
                                <div class="modal-footer">
                                    <div class="text-left">


                                        <a class="btn btn-success"
                                           href="javascript:void(0)" id="send_Proposal">
                                            ثبت پیشنهاد</a>


                                        <button style="width: 130px" type="button" class="btn btn-danger"
                                                data-dismiss="modal">
                                            انصراف
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="ajaxModelSendProposal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption" id="caption">
                        ثبت پیشنهاد برای سفارش
                    </div>
                    <div class="caption pull-left">
                        <a data-dismiss="modal">
                            <i style="color: white" class="pull-left fa fa-closee"></i>
                        </a>
                    </div>

                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form autocomplete="off" id="productFormsend" name="productFormsend">

                                <input type="hidden" id="order_id" name="order_id">
                                @csrf
                                <div class="row">

                                    <div class="col-md-12">
                                        <label>قیمت پیشنهادی
                                            <span
                                                style="color: red"
                                                class="required-mark">*</span>
                                        </label>
                                        <input type="number" id="price" name="price" class="form-control"
                                               placeholder="لطفا قیمت را وارد کنید" >
                                    </div>


                                    <div class="col-md-12">
                                        <label>توضیحات
                                            <span
                                                style="color: red"
                                                class="required-mark">*</span>
                                        </label>
                                      <textarea name="description" id="description" class="form-control" placeholder="لطفا توضیحات خود را وارد کنید">

                                      </textarea>
                                    </div>

                                </div>
                                <br/>
                                <hr/>
                                <div class="modal-footer">
                                    <div class="text-left">




                                        <button style="width: 130px" type="submit" class="btn btn-success"
                                                id="saveBtnsend" value="ثبـــــــت">
                                            ثبت
                                        </button>

                                        <button style="width: 130px" type="button" class="btn btn-danger"
                                                data-dismiss="modal">
                                            انصراف
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
