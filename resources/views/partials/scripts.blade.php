<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('click', '.add_product', function(e){
                e.preventDefault();
                let name = $("#name").val();
                let price = $("#price").val();
                // console.log(name + ' ' + price + '$');

                $.ajax({
                    url: "{{ route('add.product') }}",
                    method: 'POST',
                    data: {name:name, price:price},
                    success: function(res)
                    {
                        if(res.status == "success")
                        {
                         $('#addModal').modal("hide");   
                         $('#addProductForm')[0].reset();
                         $('.table-data').load(location.href + ' .table-data');
                        }
                    },
                    error: function(err)
                    {
                        let error = err.responseJSON;
                        $.each(error.errors, function(index, value){
                            $(".errMsgContainer").append('<span class="text-danger"></span>' + value + '</span>' + '<br>');
                        });
                    }
                });

            })
        });
    </script>
