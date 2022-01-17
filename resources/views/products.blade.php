@extends('layout')
@section('content')

    <div class="col-md-1"></div>
    <div class="col-md-10">

        <div class="row">

            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card-group">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="card-title">
                                            {{ $product->name }}
                                        </h5>
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <img src="{{ asset('images/phone') }}/{{ $product->image }}" alt="" width="100%"
                                            class="img-fluid">
                                    </div>
                                    <div class="col-md-12">
                                        <br><br>
                                        <div class="card-deading">Price: {{ $product->price }}</div>
                                        <br>
                                        <button type="submit" class="btn btn-danger btn-xs float-right">Add to
                                            Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>
    <div class="col-md-1"></div>






@endsection
