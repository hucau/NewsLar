@extends('client.master')
@section('title','Thể Loại Tin')
@section('content')
<h1 style="margin-bottom:10px;color:red">Thể Loại : {{ $news[0]['cate']['name'] }}</h1>
@if(isset($news))
@foreach($news as $item)
<div class="news">
	<h1>{!! $item['title'] !!}</h1>
	<img src="{{ asset('public/uploads/news/'.$item['image']) }}" class="thumbs" />
	<p>{!! $item['intro'] !!}</p>
	<a href="{{ route('getDetail',['id'=>$item['id'],'slug'=>$item['slug']]) }}.html" class="readmore">Đọc thêm</a>
	<div class="clearfix"></div>
</div>
@endforeach
@else
	<br/><br/><h3 align="center">Danh mục này rỗng</h3>
@endif
@endsection     
