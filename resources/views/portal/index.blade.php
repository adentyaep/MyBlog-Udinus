@extends('layouts.portalApp')
@section('slider')
<div class="carousel-item active">
    <img src="udinus.jpg" class="d-block w-100" alt="...">
    <div class="carousel-caption d-none d-md-block">
      <h5>SELAMAT DATANG DI BLOG UDINUS</h5>
      <p>Universitas Swasta Terbaik di Indonesia.</p>
    </div>
  </div>
  @foreach ($data['slider'] as $slider)
  <div class="carousel-item">
    <img src="{{ url($slider->image) }}" class="d-block w-100" alt="...">
    <div class="carousel-caption d-none d-md-block">
      <h5>{{ $slider->title }}</h5>
    </div>
  </div>
    @endforeach
</div>
    
@endsection

@section('content')
<div class="row p-5">
    @foreach ($data['posts'] as $post)
    <div class="col-md-4">
        <div class="card" >
            <img src="{{ url($post->thumnail) }}"  class="card-img-top" height="250" width="200" alt="{{ $post->title }}">
            <div class="card-body">
              <h5 class="card-title">{{ $post->title }}</h5>
              {!! Str::substr($post->content, 0, 50). "..."!!}

              <div><a href="#" class="btn btn-primary">Continue Reading</a></div>
            </div>
        </div>
    </div>
    @endforeach
    
    
</div>

@endsection