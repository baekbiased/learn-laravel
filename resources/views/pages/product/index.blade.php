@extends('layouts.app')

@section('title', 'Products')

@section('scripts')
    <script>

        $("#start_price").change(function () {
            $("#end_price").removeAttr("disabled");
        });

        function exportToCSV() {
            // let url= "http://127.0.0.1:8000/product/exportToCSV?start_price=80&end_price=850";

            var start_price = $('#start_price').val();
            var end_price = $('#end_price').val();

            var queryString = 'start_price=' + start_price + '&end_price=' + end_price;
            var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?' + queryString;
            window.history.pushState({path: newurl}, '', newurl);

            var urlParams = new URLSearchParams(window.location.search);
            var query = urlParams.toString();
            let url = "{{ route('products.exportToCSV', ':id') }}";
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
    @if(session('success'))
        <x-alert type="success">{{ session('success') }}</x-alert>
    @endif

    @if(session('error'))
        <x-alert type="danger">{{ session('error') }}</x-alert>
    @endif


{{--    @include('pages.product.filters')--}}


    <div id="app">
        <filters prices={{$prices}}></filters>
        <button onclick="exportToCSV()" id="export_to_csv" class="btn btn-sm btn-primary" style="float: right">Export to CSV</button>
        <product-table> </product-table>
    </div>

@endsection
