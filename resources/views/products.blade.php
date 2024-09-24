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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <th>{{ $key + 1 ?? '' }}</th>
                                    <td>{{ $product->name ?? '' }}</td>
                                    <td>{{ $product->price ?? '' }}</td>
                                    <td>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#updateModal"
                                            data-id = "{{ $product->id }}" data-name = "{{ $product->name }}"
                                            data-price = "{{ $product->price }}"
                                            class="btn btn-success update_product_form">
                                            <i class="las la-edit"></i>
                                        </a>
                                        <a href="" class="btn btn-danger">
                                            <i class="las la-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>

    @include('partials.scripts')
    @include('product.create')
    @include('product.update')

</body>

</html>
