@extends('layouts.app')
@section('content')
    <h3>Profile About Me</h3>
    <hr>

    @if (Session::has('status'))
        <div class="alert alert-warning" role="alert">
            {{ Session::get('status') }}
        </div>
    @endif

    <div class="container">
        <div class="row">
          <div class="col align-self-center">
              <div class="text-center"><img src="{{ url($data->photo) }}" alt="profile" class="img-thumbnail" width="200x200px"></div>
          </div>
          <div class="col align-self-center">
            <h4>{{ $data->name }}</h4>
            <p>{{ $data->short_description }}</p>
            <h5 for="content">Content</h5><p>{{ $data->content }}</p>
          </div>
        </div>
      </div>

      

      
    
@endsection
    