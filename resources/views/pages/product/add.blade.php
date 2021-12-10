@extends('layouts.app')

@section('title', 'Add Products')

@section('scripts')
    <script>
        // $(document).ready(function () {
        //
        //     $("#type").change(function () {
        //
        //         var type = $('#type').val();
        //         console.log(type);
        //         if (type == 'auto') {
        //             $('#trigger_at').attr('disabled', false);
        //         } else {
        //             $('#trigger_at').val('0').trigger('change');
        //             $('#trigger_at').attr('disabled', true);
        //         }
        //     });
        //
        // });
    </script>
@endsection

@section('content')

    <h1 class="h3 mb-3">Add New Product</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                        <x-alert type="success">{{ session('success') }}</x-alert>
                    @endif

                    @if(session('error'))
                        <x-alert type="danger">{{ session('error') }}</x-alert>
                    @endif
                    <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                        @csrf

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Product</h5>
                                </div>
                                <div class="card-body">

                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Product Name" name="name" value="{{ old('name' )}}">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Price</label>
                                        <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="Product Price" name="price" value="{{ old('price' )}}">
                                        @error('price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label w-100">Product Image</label>
{{--                                        <input class="@error('image') is-invalid @enderror" type="file" name="image" >--}}
                                        <div id="app">
                                            <image-preview />
                                        </div>
                                        @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Add Product</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
