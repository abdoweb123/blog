@extends('layouts.app')

@section('admin_content')

<div class="card-header">لوحة التحكم</div>

<div class="card-body">
    <div class="row">
        <div class="col-md-12 mb-4">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            تم تسجيل دخولك
            <a href="{{url('/admin/create/post')}}" class="btn btn-primary">إضافة مقالة جديدة</a>
        </div>
        <div class="col-md-12 mb-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>العنوان</th>
                        <th>النص</th>
                        <th>تاريخ الإضافة</th>
                        <th>تعديل</th>
                    </tr>
                    <thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{!! $post->content !!}</td>
                        <td>{{$post->created_at}}</td>
                    <td>
                        <a class="btn btn-success" href="{{url('admin/edit/'.$post->id)}}">تعديل</a>
                        <a class="btn btn-danger" href="{{url('admin/soft/delete/'.$post->id)}}">حذف</a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$posts->links()}}
        </div>
    </div>

</div>
@endsection
