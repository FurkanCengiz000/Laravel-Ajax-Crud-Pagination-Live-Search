<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Ajax Crud</title>
    <!-- Styles -->
    @include('partials.styles')
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="mt-5 mb-5 text-center">Laravel Ajax Crud</h2>
                <a href="" class="btn btn-success mt-3 mb-3" data-bs-toggle="modal"
                    data-bs-target="#addModal">Add Product</a>
                <div class="table-data">
                    @include('partials.table')
                </div>
            </div>
        </div>
    </div>

    @include('partials.scripts')
    @include('product.create')
    @include('product.update')
    {!! Toastr::message() !!}



</body>

</html>
