@extends('layout')
@section('content')

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-6">
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Price</td>
                    <td>Quantiy</td>
                    <td>Category</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product )
                <tr>
                    <td>{{$product->id}}</td>
                    <!--asset means it wil looking for the public folder-->
                    <td><img src="{{asset('images/phone')}}/{{$product->image}}" alt="" width="100" class="img-fluid"> </td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->catName}}</td>
                    <td><a href="{{route('editProduct',['id'=>$product->id])}}" class="btn btn-warning">Edit</a>&nbsp;
                    <a href="{{route('deleteProduct',['id'=>$product->id])}}" class="btn btn-danger" onClick="return confirm('Are you sure want to delete this product?')">Delete</a></td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
    </div>
    <div class="col-sm-2"></div>
</div>


@endsection