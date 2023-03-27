@extends('layouts.app')

@section('style')
    <style>
        *{direction: rtl !important;}
        textarea
        {
            visibility: visible !important;
        }
    </style>
@stop

@section('admin_content')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
          selector: '#mytextarea',
          menubar: false,
          language: 'ar'
        });
      </script>

    <div class="card-header text-center">تعديل مقالة</div>

    <div class="card-body">
    <form enctype="multipart/form-data" class="form-horizontal" action="{{url('/admin/update/'.$post->id)}}" method="post">
       @csrf
        @method('PUT')
        <div class="form-group">
            <input class="form-control" type="text" name="title" placeholder="العنوان هنا" value="{{$post->title}}">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="author" placeholder="اسم المؤلف" value="{{$post->author}}">
        </div>
        <div class="form-group">
            <input class="form-control" type="date" name="date" value="{{$post->date}}">
        </div>
        <div class="form-group text-right">
                <textarea name="my_content" id="mytextarea">{!! $post->content !!}</textarea>
            </div>
            <div class="form-group">
                <div class="row">
                    <?php $images = explode('|',$post->image) ?>
                    @foreach($images as $item)
                        <img width="100%" class="bd-placeholder-img card-img-top" src="{{url('files/'.$item)}}" style="width: 150px; height:100px"/>
                    @endforeach
                    <div class="col-md-12">
                        <input class="form-control" type="file" name="filenames[]" accept="image/*" />
                    </div>
                </div>

            </div>
            <div class="form-group">
                <input class="btn btn-success" type="submit" value="تعديل"/>
            </div>
        </form>
    </div>
@endsection
