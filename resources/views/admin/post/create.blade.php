@extends('layouts.app')
@section('content')
    <h3>Create Posts</h3>
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
        <form action="{{ url('admin/post/create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control"><br>
            <label for="thumnail">Thumbnail</label>
            <input type="file" name="thumnail" class="form-control"><br>
            <label for="category">Category</label>
            <select name="category_id" class="form-control" id="category">
                <option value="">Select Category</option>
                @foreach ($category as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select><br>
            <label for="headline">Headline</label>
            <select name="is_headline" id="is_headline" class="form-control">
                <option value="0">Tidak Headline</option>
                <option value="1">Headline</option>
            </select><br>
            <label for="status">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="1">Publish</option>
                <option value="0">Tidak Publish</option>
            </select><br>
            <textarea name="content" id="content" cols="50" rows="10" class="form-control"></textarea><br>
            <script src="{{ url('assets/ckeditor/ckeditor.js') }}"></script>
            <script>
                var content = document.getElementById("content");
                CKEDITOR.replace(content,{
                    language:'en-gb'
                });
                CKEDITOR.config.allowedContent = true;
            </script>
            <input type="submit" name="submit" class="btn btn-md btn-primary" value="Tambah Data">
            <a href="{{ url('admin/post') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left"> Kembali</i></a>
        </form>
    </div>
@endsection
