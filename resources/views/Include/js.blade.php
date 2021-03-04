<script src="{{asset('/public/bower_components/jquery/dist/jquery.min.js')}}"></script>

<script src="{{asset('/public/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{asset('/public/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('/public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('/public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{asset('/public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('/public/bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{asset('/public/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('/public/dist/js/pages/dashboard.js')}}"></script>
<script src="{{asset('/public/dist/js/demo.js')}}"></script>
<script src="{{asset('/public/assets/sweetalert.js')}}"></script>
<script src="{{asset('/public/assets/select2.js')}}"></script>
<script>
    $("#single").select2({
        language: {
            noResults: function () {
                return 'نقش با این نام یافت نشد';
            },
        },
        placeholder: " نقش کاربر را انتخاب کنین",
        allowClear: true

    });
    $("#multiple").select2({
        language: {
            noResults: function () {
                return 'نقش با این نام یافت نشد';
            },
        },
        placeholder: " نقش کاربر را انتخاب کنین",
        allowClear: true
    });
    $("#singl").select2({
        language: {
            noResults: function () {
                return 'کاربری با این نام یافت نشد';
            },
        },
        placeholder: "لطفا فرد جایگزین را انتخاب کنین",
    });
    $("#multipl").select2({
        language: {
            noResults: function () {
                return 'کاربری با این نام یافت نشد';
            },
        },
        placeholder: "لطفا کاربر را انتخاب کنین",
    });
    $(document).ready(function () {
        $('#customer_id').select2({
            width: '100%',
            dir: 'rtl',
            placeholder: 'مشتریان',
            language: {
                noResults: function () {
                    return 'مشتری با این نام یافت نشد';
                },
            },
        });
    });
    $(document).ready(function () {
        $('#user_id').select2({
            width: '100%',
            dir: 'rtl',
            placeholder: 'کاربران',
            language: {
                noResults: function () {
                    return 'کاربری با این نام یافت نشد';
                },
            },
        });
    });
    $(document).ready(function () {
        $('#country').select2({
            width: '100%',
            dir: 'rtl',
            placeholder: 'کشورها',
            language: {
                noResults: function () {
                    return 'کشوری با این نام یافت نشد';
                },
            },
        });
    });
    $(document).ready(function () {
        $('#city').select2({
            width: '100%',
            dir: 'rtl',
            placeholder: 'استان',
            language: {
                noResults: function () {
                    return 'استانی با این نام یافت نشد';
                },
            },
        });
    });
</script>
<script src="{{asset('/public/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset('/public/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}"
        type="text/javascript"></script>
<script src="{{asset('/public/assets/pages/scripts/table-datatables-colreorder.js')}}"
        type="text/javascript"></script>
<script src="{{asset('/public/assets/persian-date.js')}}"></script>
<script src="{{asset('/public/assets/persian-datepicker.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".example1").persianDatepicker({
            observer: true,
            format: 'YYYY/MM/DD',
            altField: '.example1-alt',
        });
    });
</script>
<script>
    function myFunction() {
        $(window).on("load", function () {
            $('#loader').hide();
        });
    }
</script>
<script>
    $(document).ready(function () {
        $('#select2-example').select2({
            width: '100%',
            placeholder: 'نقش پرسنل',
            language: {
                noResults: function () {
                    return 'نقش با این نام یافت نشد';
                },
            },
        });
    });


    $(document).ready(function () {
        $('#Audience').select2({
            width: '100%',
            placeholder: 'مخاطب',
            language: {
                noResults: function () {
                    return 'مخاطب با این نام یافت نشد';
                },
            },
        });
    });

    $(document).ready(function () {
        $('#Copy').select2({
            width: '100%',
            placeholder: 'رونوشت',
            language: {
                noResults: function () {
                    return 'مخاطب با این نام یافت نشد';
                },
            },
        });
    });


    $(document).ready(function () {
        $('#products').select2({
            width: '100%',
            placeholder: 'محصولات',
            language: {
                noResults: function () {
                    return 'محصولی با این نام یافت نشد';
                },
            },
        });
    });

    $(document).ready(function () {
        $('#invoices').select2({
            width: '100%',
            placeholder: 'فاکتورها',
            language: {
                noResults: function () {
                    return 'فاکتور با این نام یافت نشد';
                },
            },
        });
    });


    $(document).ready(function () {
        $('#list').select2({
            width: '100%',
            placeholder: 'جستجو در زمانبندی',
            language: {
                noResults: function () {
                    return 'موجود نمیباشد!';
                },
            },
        });
    });

    $(document).ready(function () {
        $('#select2-exapl').select2({
            width: '100%',
            placeholder: 'استان/کشور',
            tags: true,
            language: {
                noResults: function () {
                    return 'کشور یا استان را انتخاب کنید';
                },
            },
        });
    });


    $(document).ready(function () {
        $('#select2-eapl').select2({
            width: '100%',
            placeholder: 'نحوه آشنایی',
            tags: true,
            language: {
                noResults: function () {
                    return 'نحوه آشنایی را وارد کنید';
                },
            },
        });
    });


    $(document).ready(function () {
        $('#select2-exampled').select2({
            width: '100%',
            placeholder: 'نقش پرسنل',
            language: {
                noResults: function () {
                    return 'نقش با این نام یافت نشد';
                },
            },
        });
    });

    $(document).ready(function () {
        $('#select2-exampl').select2({
            width: '100%',
            placeholder: 'لطفا پرسنل را انتخاب کنید',
            language: {
                noResults: function () {
                    return 'پرسنلی با این نام یافت نشد';
                },
            },
        });
    });
</script>
<script src="{{asset('/public/assets/sweetalert.js')}}"></script>
<script>
    $(".portlet-title").on("mousedown", function (mousedownEvt) {
        var $draggable = $(this);
        var x = mousedownEvt.pageX - $draggable.offset().left,
            y = mousedownEvt.pageY - $draggable.offset().top;
        $("body").on("mousemove.draggable", function (mousemoveEvt) {
            $draggable.closest(".modal-dialog").offset({
                "left": mousemoveEvt.pageX - x,
                "top": mousemoveEvt.pageY - y
            });
        });
        $("body").one("mouseup", function () {
            $("body").off("mousemove.draggable");
        });
        $draggable.closest(".modal").one("bs.modal.hide", function () {
            $("body").off("mousemove.draggable");
        });
    });
</script>
