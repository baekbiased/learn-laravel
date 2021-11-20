@extends('layouts.app')

@section('title', 'Products')

@section('scripts')
    <script>

        $("#start_price").change(function () {
            $("#end_price").removeAttr("disabled");
        });

        function get_query_params() {

            var start_price = $('#start_price').val();
            var end_price = $('#end_price').val();

            var queryString = 'start_price=' + start_price + '&end_price=' + end_price;
            var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?' + queryString;
            window.history.pushState({path: newurl}, '', newurl);

            var urlParams = new URLSearchParams(window.location.search);
            var query = urlParams.toString();
            let url = "{{ route('product.index', ':id') }}";
            url = url.replace(':id', query);
            document.location.href = url;
        }



    </script>

{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('#products-table').DataTable();--}}
{{--        });--}}
{{--    </script>--}}
@endsection

@section('content')
    @include('pages.product.filters')
    <h1 class="h3 mb-3">Products DataTables</h1>
    <div class="row">
        <div class="col-12">
            <div class="card">

                @if(session('success'))
                    <x-alert type="success">{{ session('success') }}</x-alert>
                @endif

                @if(session('error'))
                    <x-alert type="danger">{{ session('error') }}</x-alert>
                @endif

                <div class="card-header">
                    <h5 class="card-title">Products</h5>
                </div>
                <div class="card-body">
                    <div id="datatables-reponsive_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="products-table" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" aria-describedby="datatables-reponsive_info">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{$product->id}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>${{$product->price}}</td>
                                                <td>{{$product->image}}</td>
                                                <td>{{$product->created_at->diffForHumans()}}</td>
                                                <td class="table-action">
                                                    <a href="{{ route('product.edit', $product->id)  }}" class="btn" style="display: inline">
                                                        <i class="fa fa-edit text-info"></i>
                                                    </a>
                                                    <form method="post" action="{{ route('product.destroy', $product->id) }}" onsubmit="return confirmSubmission(this, 'Are you sure you want to delete this message ')" style="display: inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn text-danger" href="{{ route('product.destroy', $product->id) }}">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
