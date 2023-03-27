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

    <div class="card-header text-center">إضافة مقالة</div>

    <div class="card-body">
    <form class="form-horizontal" action="{{url('/admin/store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input class="form-control" type="text" name="title" placeholder="العنوان هنا" value="{{@old('title')}}">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="author" placeholder="اسم المؤلف" value="{{@old('author')}}">
        </div>
        <div class="form-group">
            <input class="form-control" type="date" name="date" value="{{@old('date')}}">
        </div>
        <div class="form-group text-right">
            <textarea name="my_content" id="mytextarea" cols="90" rows="6"> {{@old('my_content')}}</textarea>
        </div>
        <div class="form-group">
            <input class="form-control" type="file" name="filenames[]" accept="image/*" />
        </div>
        <div class="form-group">
            <input class="btn btn-success" type="submit" value="نشر"/>
        </div>
        </form>
    </div>
@endsection
