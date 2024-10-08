<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function() {

        // Create Product Data
        $(document).on('click', '.add_product', function(e) {
            e.preventDefault();
            let name = $("#name").val();
            let price = $("#price").val();
            // console.log(name + ' ' + price + '$');

            $.ajax({
                url: "{{ route('add.product') }}",
                method: 'POST',
                data: {
                    name: name,
                    price: price
                },
                success: function(res) {
                    if (res.status == "success") {
                        $('#addModal').modal("hide");
                        $('#addProductForm')[0].reset();
                        $('.table-data').load(location.href + ' .table-data');
                        Command: toastr["success"]("Product Has Been Created", "Success")
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                },
                error: function(err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value) {
                        $(".errMsgContainer").append(
                            '<span class="text-danger"></span>' + value +
                            '</span>' + '<br>');
                    });
                }
            });
        })

        //Show Product Value in Update Form
        $(document).on('click', '.update_product_form', function() {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let price = $(this).data('price');

            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_price').val(price);

        });

        // Update Product Data
        $(document).on('click', '.update_product', function(e) {
            e.preventDefault();
            let up_id = $("#up_id").val();
            let up_name = $("#up_name").val();
            let up_price = $("#up_price").val();

            let url = "{{ route('update.product', ':id') }}";
            url = url.replace(':id', up_id);

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    _method: 'PUT',
                    id: up_id,
                    name: up_name,
                    price: up_price
                },
                success: function(res) {
                    if (res.status == "success") {
                        $('#updateModal').modal("hide");
                        $('#updateProductForm')[0].reset();
                        $('.table-data').load(location.href + ' .table-data');
                        Command: toastr["success"]("Product Has Been Updated", "Success")
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                },
                error: function(err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value) {
                        $(".errMsgContainer").append(
                            '<span class="text-danger"></span>' + value +
                            '</span>' + '<br>');
                    });
                }
            });
        })

        // Delete Product Data
        $(document).on('click', '.delete_product', function(e) {
            e.preventDefault();
            let product_id = $(this).data('id');

            let url = "{{ route('delete.product', ':id') }}";
            url = url.replace(':id', product_id);

            if (confirm('Are You Sure To Delete This Product?')) {
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        _method: 'DELETE',
                        id: product_id,
                    },
                    success: function(res) {
                        if (res.status == "success") {
                            $('.table-data').load(location.href + ' .table-data');
                            Command: toastr["success"]("Product Has Been Deleted",
                                "Success")
                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                        }
                    }
                });
            }


        })
        // Pagination
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            let url = "{{ route('pagination.product') }}?page=" + page;
            product(url);
        });

        function product(url) {
            $.ajax({
                url: url,
                success: function(res) {
                    $('.table-data').html(res);
                },
                error: function() {
                    alert("An error occurred while loading data.");
                }
            });
        }

        // Search  Product
        $(document).on('keyup', function(e){
            e.preventDefault();
            let search_data = $("#search").val();

            $.ajax({
                url:"{{ route('search.product') }}",
                method: "GET",
                data: {search:search_data},
                success:function(res)
                {
                    $('.table-data').html(res);
                    console.log(res);
                    if(res.status == "nothing_found")
                    {
                        $('.table-data').html('<div class="alert alert-danger" role="alert"> Nothing Found </div>')
                    }
                }
            })

        })



    });
</script>
