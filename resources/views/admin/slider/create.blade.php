@extends('layouts.app')
@section('content')
    <h3>Create Sliders</h3>
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
        <form action="{{ url('admin/slider/create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control"><br>
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control"><br>
            <label for="url">URL</label>
            <input type="link" name="url" class="form-control"><br>
            <label for="Order">Order</label>
            <input type="number" name="order" id="order" class="form-control"><br>
            <label for="status">Status</label>
            <select name="status" id="status" class=" form-select">
                <option value="1">Publish</option>
                <option value="0">Tidak Publish</option>
            </select><br>
            <input type="submit" name="submit" class="btn btn-md btn-primary" value="Tambah Data">
            <a href="{{ url('admin/category') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left"> Kembali</i></a>
        </form>
    </div>
@endsection