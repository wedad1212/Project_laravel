@extends('layout.index')
@section('custom_top_script')
@stop

@section('content')
<link rel="stylesheet" href="{{asset('cssfile/cateshow.css')}}">
<div class="content">
    <div class="module">
        <div class="module-head">
            <h3>All Categories</h3>
        </div>
        <div class="module-body">
            
        <table class="table table-striped table-bordered table-condensed">
            <thead>
                <tr>
                    <th><h5>ID</h5></th>
                    <th><h5>Name category</h5></th>
                    <th>Delete of the category</th>
                    
                </tr>
            </thead>
            <tbody>
                @if($categories==null)
                {{ "Not found category" }}
                @else
                @foreach ($categories as $category)
                <tr>
                    <th>{{$category->id}}</th>
                    <th>{{$category->category}}</th>
                    <th><a style="color: red" href="{{route('delete-cate',$category->id)}}">delete</a></th>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        </div>
    </div>
</div>
@stop