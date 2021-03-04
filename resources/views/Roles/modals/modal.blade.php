<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
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
                                        <label>نام نقش
                                            <span
                                                style="color: red"
                                                class="required-mark">*</span>
                                        </label>
                                        <input type="text" id="title" name="title" class="form-control"
                                               placeholder="لطفا نام نقش را وارد کنید" >
                                    </div>

                                </div>
                                <br/>
                                <hr/>
                                <div class="modal-footer">
                                    <div class="text-left">




                                        <button style="width: 130px" type="submit" class="btn btn-success"
                                                id="saveBtn" value="ثبـــــــت">
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
