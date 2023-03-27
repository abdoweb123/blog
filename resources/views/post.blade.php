@extends('layouts.default')



@section('style')
    <style>
        .card-body , img{
            border: 1px solid #ddd;
            box-shadow: 5px 3px 10px #ddd;
        }
        .make_comment{
            display: none;
        }
        .form-group textarea{
            text-align: end;
        }
    </style>
@stop

@section('body')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-8">
            <div class="card mb-4 shadow-sm">
                <?php $images = explode('|',$post->image) ?>
                @foreach($images as $item)
                    <img width="100%" class="bd-placeholder-img card-img-top" src="{{url('files/'.$item)}}"/>
                @endforeach


                <div class="card-body">
                    <p class="card-text">
                        <a href="#">
                            {{$post->title}}
                        </a>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">{{$post->created_at}}</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 text-right">
            <h3>التعليقات</h3>
            @include('includes.messages')
            <a class="add_comment" style="color:royalblue; cursor: pointer">.....إضافة تعليق</a>
            <div class="make_comment">
                <form action="{{route('store_comment')}}" method="post">
                    @csrf
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <div class="form-group mt-2">
                        <textarea name="my_content" rows="4" cols="40"></textarea>
                    </div>

                    <button type="button" class="btn btn-secondary">إلغاء</button>
                    <button type="submit" class="btn btn-primary">نشر</button>
                </form>
            </div>

            <h4 class="mt-4">التعليقات السابقة</h4>
            @isset($post->comments)
                @foreach($post->comments as $comment)
                    <div class="card-body mb-2">
                        <p class="card-text">
                            <a href="#">{{$comment->user->name}}</a>
                        </p>
                        <p>{{$comment->content}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">{{$comment->created_at}}</small>
                            <?php

                            ?>
                            <small class="text-muted">{{$comment->created_at->diffForHumans()}}</small>
                        </div>
                        @if($comment->user_id == auth()->id())
                        <a class="btn btn-danger" href="{{url('admin/soft/delete/comment/'.$comment->id)}}">حذف</a>
                        @endif
                    </div>
                @endforeach
            @endisset

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! $post->body !!}
        </div>
    </div>
</div>

@endsection

@section('js')
    <script>
        $('.add_comment').click(function (){
            $('.make_comment').show();
        });

        $('.btn-secondary').click(function (){
            $('.make_comment').hide();
        });
    </script>
@stop
