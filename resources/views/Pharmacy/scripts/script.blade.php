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
            $('#caption').text('ثبت سفارش');

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
            ajax: "{{ route('admin.pharmacy.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', "className": "dt-center"},
                {data: 'code', name: 'code'},
                {data: 'date', name: 'date'},
                {data: 'number', name: 'number'},
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

        $('body').on('click', '.see_suppliers', function () {

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
                    url: "{{ route('admin.pharmacy.list') }}",
                    data: {
                        order_id: id,
                    },
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', "className": "dt-center"},
                    {data: 'user', name: 'user', "className": "dt-center"},
                    {data: 'date', name: 'date', "className": "dt-center"},
                    {data: 'price', name: 'price', "className": "dt-center"},
                    {data: 'description', name: 'description', "className": "dt-center"},


                ]
            });

            $('#send_Proposal').click(function () {

                $('#ajaxModelSendProposal').modal('show');
                $('#order_id').val(id);

            });

        });

        $('#pharmacy').addClass('active');

    });
</script>


<script language="javascript">


    added_inputs3_array = [];
    if (added_inputs3_array.length >= 1)
        for (var a in added_inputs3_array)
            added_inputs_array_table3(added_inputs3_array[a], a);


    function added_inputs_array_table3(data, a) {
        var myNode = document.createElement('div');

        myNode.id = 'product_title' + a;
        myNode.innerHTML += "<div class='form-group'>" +
            "<select id=\'product" + a + "\'  name=\"product[]\"\n" +
            "class=\"form-control\"/>" +
            "<option>محصول را انتخاب کنید...</option>" +
            @foreach($products as $product)
                "<option value='{{$product->id}}'>{{$product->name}}</option>" +
            @endforeach
                "</select></div></div></div>";
        document.getElementById('product_title').appendChild(myNode);

        var myNode = document.createElement('div');
        myNode.id = 'brand_title' + a;
        myNode.innerHTML += "<div class='form-group'>" +
            "<select id=\'brand" + a + "\'  name=\"brand[]\"\n" +
            "class=\"form-control\"/>" +
            "<option>برند را انتخاب کنید...</option>" +
            @foreach($brands as $brand)
                "<option value='{{$brand->id}}'>{{$brand->name}}</option>" +
            @endforeach
            "</select></div></div></div>";
        document.getElementById('brand_title').appendChild(myNode);

        var myNode = document.createElement('div');
        myNode.id = 'number_title' + a;
        myNode.innerHTML += "<div class='form-group'>" +
            "<input value='1' type='number' id=\'number" + a + "\'  name=\"number[]\"\n" +
            "class=\"form-control\"/>" +
            "</div></div></div>";
        document.getElementById('number_title').appendChild(myNode);

        var myNode = document.createElement('div');
        myNode.id = 'action' + a;
        myNode.innerHTML += "<div class='form-group'>" +
            "<button onclick='deleteService3(" + a + ", event)' class=\"form-control btn btn-danger\"><i class=\"fa fa-remove\"></button></div>";
        document.getElementById('action').appendChild(myNode);

    }

    function deleteService3(id, event) {
        event.preventDefault();
        $('#product_title' + id).remove();
        $('#brand_title' + id).remove();
        $('#number_title' + id).remove();
        $('#action' + id).remove();
    }

    function addInput12() {
        var data = {
            'title': '',
            'icon': '',
        };
        added_inputs3_array.push(data);
        added_inputs_array_table3(data, added_inputs3_array.length - 1);
    }


</script>
