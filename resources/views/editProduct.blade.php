@extends('layout')
@section('content')

<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Edit Product</h3>
        <form action="{{route('updateProduct')}}" method="POST" enctype="multipart/form-data">
            <!--if you never put csrf,you will got error-->
            <!--csrf it will generate a token, used for :
                1) double encrypt, when you preeesed refresh it will not double submit,
                2) it will avoid data submit from other website to prevent them jam your website-->
            @csrf
            @foreach($products as $product)
            <input type="hidden" name="id" value="{{$product->id}}">
            <div class="form-group">
          
                <img src="{{asset('images/phone/')}}/{{$product->image}}" alt="" width="100" class="img-fluid"><br>
                <label for="editproduct">Product Name</label>
                <input class="form-control" type="text" id="productName" name="productName" required value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label for="productDescription">Description</label>
                <input class="form-control" type="text" id="productDescription" name="productDescription" required value="{{$product->description}}">
            </div>
            <div class="form-group">
                <label for="productPrice">Price</label>
                <input class="form-control" type="number" id="productPrice" name="productPrice" required value="{{$product->price}}">
            </div>
            <div class="form-group">
                <label for="productQuantity">Quantity</label>
                <input class="form-control" type="number" id="productQuantity" name="productQuantity" min="0" required value="{{$product->quantity}}">
            </div>

            <div class="form-group">
                <label for="productImage">Image</label>
                <input class="form-control" type="file" id="productImage" name="productImage" value="">
            </div>
            <div class="form-group">
                <label for="addcategory">Category</label>
                <select name="categoryID" id="categoryID" class="form-control">
                    @foreach($categoryID as $category)
                    <option value="{{$category->id}}" @if($product->CategoryID==$category->id)
                        selected
                        @endif
                        >{{$category->name}}

                    </option>
                    @endforeach
                </select>
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Update</button>
            <br><br>
    </div>
    </form>
    <br><br>
</div>
<div class="col-sm-3"></div>
</div>


@endsection