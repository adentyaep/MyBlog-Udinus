@extends('layouts.app')
@section('content')
<div class="jumbotron">
    <h3>Edit Category</h3>
    <hr>
    <div class="col-lg-6">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ url('admin/category/edit/'. $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $data->name }}" class="form-control"><br>
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control"><br>
            <input type="submit" name="submit" class="btn btn-md btn-primary" value="Tambah Data">
            <a href="{{ url('admin/category') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left"> Kembali</i></a>
        </form>
    </div>
</div>
    
@endsection