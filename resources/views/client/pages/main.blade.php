@extends('client.master')
@section('title','Trang Chủ')
@section('content')
@foreach($news as $item)
<div class="news">
	<h1>{{ $item['title'] }}</h1>
	<img src="{{ asset('public/uploads/news/'.$item['image']) }}" class="thumbs" />
	<h4>Thể Loại : {{ $item['cate']['name'] }}</h4>
	<p>{!! $item['intro'] !!}</p>
	<a href="{{ route('getDetail',['id'=>$item['id'],'slug'=>$item['slug'] ]) }}.html" class="readmore">Đọc thêm</a>
	<div class="clearfix"></div>
</div>
@endforeach
@endsection