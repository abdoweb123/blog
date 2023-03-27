@extends('layouts.default')
@section('body')
<section class="jumbotron text-center">
    <div class="container">
      <h1>مرحباً بكم</h1>
      <p class="lead text-muted">مرحباً بكم في مدونتي</p>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">

        @foreach ($posts as $post)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
              <?php $images = explode('|',$post->image) ?>
              @foreach($images as $item)
             <img width="100%" class="bd-placeholder-img card-img-top" src="{{url('files/'.$item)}}" style="height:150px"/>
              @endforeach



            <div class="card-body">
            <p class="card-text">
            <a href="{{url('admin/post/'.$post->id)}}">
              {{$post->title}}
            </a>
            </p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">{{$post->created_at}}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
@endsection
