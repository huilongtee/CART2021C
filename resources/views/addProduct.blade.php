@extends('layout')
@section('content')

<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add New Product</h3>
        <form action="{{route('addProduct')}}" method="POST" enctype="multipart/form-data">
            <!--if you never put csrf,you will got error-->
            <!--csrf it will generate a token, used for :
                1) double encrypt, when you preeesed refresh it will not double submit,
                2) it will avoid data submit from other website to prevent them jam your website-->
            @csrf
            <div class="form-group">
                <label for="addproduct">Product Name</label>
                <input class="form-control" type="text" id="productName" name="productName" required>
            </div>
            <div class="form-group">
                <label for="productDescription">Description</label>
                <input class="form-control" type="text" id="productDescription" name="productDescription" required>
            </div>
            <div class="form-group">
                <label for="productPrice">Price</label>
                <input class="form-control" type="number" id="productPrice" name="productPrice" required>
            </div>
            <div class="form-group">
                <label for="productQuantity">Quantity</label>
                <input class="form-control" type="number" id="productQuantity" name="productQuantity" min="0" required>
            </div>

            <div class="form-group">
                <label for="productImage">Image</label>
                <input class="form-control" type="file" id="productImage" name="productImage" value="" required>
            </div>
            <div class="form-group">
                <label for="addcategory">Add New Category</label>
                <select name="categoryID" id="categoryID" class="form-control">
                    @foreach($categoryID as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add New</button>
            <br><br>
    </div>
    </form>
    <br><br>
</div>
<div class="col-sm-3"></div>
</div>


@endsection