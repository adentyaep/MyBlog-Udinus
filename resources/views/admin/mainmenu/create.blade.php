@extends('layouts.app')
@section('content')
    <h3>Create Main Menu</h3>
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
        <form action="{{ url('admin/mainmenu/create') }}" method="POST" enctype="multipart/form-data" id="form">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control"><br>
            <label for="parent">Parent</label>
            <select name="parent" id="parent" class="form-control">
                <option value="0">-</option>
                @foreach ($parent as $data)
                    <option value="{{ $data->id }}">{{ $data->title }}</option>
                @endforeach
            </select><br>
            <label for="category">Category</label>
            <select name="category" class="form-control" id="category">
                <option value="">Select Category</option>
                <option value="link">Link</option>
                <option value="content">Content</option>
                <option value="file">File</option>
            </select><br>
            <div id="contents">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="50" rows="10" class="form-control"></textarea><br>
            </div>
            <div id="files">
                <label for="file">File</label>
                <input type="file" id="file" name="file" class="form-control"><br>
            </div>
            <div id="links">
                <label for="link">URL</label>
                <input type="text" id="link" name="url" class="form-control"><br>
            </div>
            <label for="Order">Order</label>
            <input type="number" name="order" id="order" class="form-control"><br>
            <label for="Status">Status</label>
            <select name="status" id="status" class="form-select"><br>
                <option value="1">Publish</option>
                <option value="0">Tidak Publish</option>
            </select><br>
        
            <input type="submit" name="submit" class="btn btn-md btn-primary" value="Tambah Data">
            <a href="{{ url('admin/mainmenu') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left"> Kembali</i></a>
        </form>
    </div>
    <script>
        $(document).ready(function(){
            $('#contents').hide();
            $('#links').hide();
            $('#files').hide();

            $('#category').on('change', function(){
                var data = $(this).val();
                $('#contents').hide();
                $('#links').hide();
                $('#files').hide();
                $('#'+data+'s').show();
            });
        });
    </script>
    <script src="{{ url('assets/ckeditor/ckeditor.js') }}"></script>
            <script>
                var content = document.getElementById("content");
                CKEDITOR.replace(content,{
                    language:'en-gb'
                });
                CKEDITOR.config.allowedContent = true;
            </script>
@endsection
