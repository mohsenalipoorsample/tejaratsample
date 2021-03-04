<script src="{{asset('/public/js/a1.js')}}" type="text/javascript"></script>
<script src="{{asset('/public/js/a2.js')}}" type="text/javascript"></script>
<script src="{{asset('/public/bower_components/jquery/dist/jquery.min.js')}}"></script>

<meta name="_token" content="{{ csrf_token() }}"/>

<script type="text/javascript">
    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#createNewProduct').click(function () {
            $('#ajaxModel').modal('show');
            $('#caption').text('مشاهده جزییات سفارش');

        });

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                $('td:eq(0)', nRow).css('background-color', '#e6e6e6');
            },
            "bInfo": false,
            "paging": true,
            "bPaginate": false,
            "columnDefs": [
                {"orderable": false, "targets": 0},
            ],
            "language": {
                "search": "جستجو:",
                "lengthMenu": "نمایش _MENU_",
                "zeroRecords": "موردی یافت نشد!",
                "info": "نمایش _PAGE_ از _PAGES_",
                "infoEmpty": "موردی یافت نشد",
                "infoFiltered": "(جستجو از _MAX_ مورد)",
                "processing": "در حال پردازش اطلاعات"
            },
            ajax: "{{ route('admin.suppliers.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', "className": "dt-center"},
                {data: 'user', name: 'user'},
                {data: 'date', name: 'date'},
                {data: 'statuss', name: 'statuss'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],

        });

        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#productForm').serialize(),
                url: "{{ route('admin.pharmacy.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    if (data.errors) {
                        $('#ajaxModel').modal('hide');
                        jQuery.each(data.errors, function (key, value) {
                            Swal.fire({
                                title: 'خطا!',
                                text: value,
                                icon: 'error',
                                confirmButtonText: 'تایید'
                            })
                        });
                    }
                    if (data.success) {
                        $('#productForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();
                        Swal.fire({
                            title: 'موفق !',
                            text: 'مشخصات محصول با موفقیت در سیستم ثبت شد',
                            icon: 'success',
                            confirmButtonText: 'تایید',
                        });
                    }
                }
            });
        });

        $('#saveBtnsend').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#productFormsend').serialize(),
                url: "{{ route('admin.suppliers.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    if (data.errors) {
                        $('#ajaxModel').modal('hide');
                        jQuery.each(data.errors, function (key, value) {
                            Swal.fire({
                                title: 'خطا!',
                                text: value,
                                icon: 'error',
                                confirmButtonText: 'تایید'
                            })
                        });
                    }
                    if (data.success) {
                        $('#productForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        $('#ajaxModelSendProposal').modal('hide');
                        $('#ajaxModelDetailOrder').modal('hide');
                        table.draw();
                        Swal.fire({
                            title: 'موفق !',
                            text: 'مشخصات  با موفقیت در سیستم ثبت شد',
                            icon: 'success',
                            confirmButtonText: 'تایید',
                        });
                    }
                }
            });
        });


        $('#saveBtnorder').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#productForm').serialize(),
                url: "{{ route('admin.pharmacy.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    if (data.errors) {
                        $('#ajaxModel').modal('hide');
                        jQuery.each(data.errors, function (key, value) {
                            Swal.fire({
                                title: 'خطا!',
                                text: value,
                                icon: 'error',
                                confirmButtonText: 'تایید'
                            })
                        });
                    }
                    if (data.success) {
                        $('#productForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();
                        Swal.fire({
                            title: 'موفق',
                            text: 'سفارش شما با موفقیت در سیستم ثبت شد',
                            icon: 'success',
                            confirmButtonText: 'تایید',
                        });
                    }
                }
            });
        });


        $('body').on('click', '.detail_order', function () {

            var id = $(this).data('id');

            $('#ajaxModelDetailOrder').modal('show');

            $("#detail_data").DataTable().destroy();
            $('.detail_data').DataTable({
                processing: true,
                serverSide: true,
                "searching": false,
                "lengthChange": false,
                "info": false,
                "bPaginate": false,
                "bSort": false,
                "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('td:eq(0)', nRow).css('background-color', '#e6e6e6');
                },
                "language": {
                    "search": "جستجو:",
                    "lengthMenu": "نمایش _MENU_",
                    "zeroRecords": "موردی یافت نشد!",
                    "info": "نمایش _PAGE_ از _PAGES_",
                    "infoEmpty": "موردی یافت نشد",
                    "infoFiltered": "(جستجو از _MAX_ مورد)",
                    "processing": "در حال پردازش اطلاعات"
                },
                ajax: {
                    url: "{{ route('admin.suppliers.list') }}",
                    data: {
                        order_id: id,
                    },
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', "className": "dt-center"},
                    {data: 'product', name: 'product', "className": "dt-center"},
                    {data: 'brand', name: 'brand', "className": "dt-center"},
                    {data: 'number', name: 'number', "className": "dt-center"},


                ]
            });

            $('#send_Proposal').click(function () {

                $('#ajaxModelSendProposal').modal('show');
                $('#order_id').val(id);

            });

        });


        $('#Supplier').addClass('active');

    });
</script>


