@extends('layout')
@section('content')

<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add New Category</h3>
        <form action="{{route('addCategory')}}" method="POST">
            <!--if you never put csrf,you will got error-->
            <!--csrf it will generate a token, used for :
                1) double encrypt, when you preeesed refresh it will not double submit,
                2) it will avoid data submit from other website to prevent them jam your website-->
            @csrf
            <div class="form-group">
                <label for="addcategory">Add New Category</label>
                <input class="form-control" type="text" id="categoryName" name="categoryName" required>
                
                <button type="submit" class="btn btn-primary">Add New</button>
            </div>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>


@endsection