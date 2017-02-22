@extends('client.master')
@section('title','Chi Tiết Tin')
@section('content')
<h1 id="title_detail">{!! $news['title'] !!}</h1>

<img src="{{ asset('public/uploads/news/'.$news['image']) }}" class="thumbs_detail" />
<p>
    <i><b>Danh mục</b>: {{ $news['cate']['name'] }}</a><br />
    <b>Nguồn</b>: {!! $news['author'] !!}<br />
    <b>Viết bởi</b>: {!! $news['author'] !!} <br />
    <b>Ngày viết</b>: {!! $news['created_at'] !!}</i>
</p><br/>
<p>
    <b>{!! $news['intro'] !!}</b>                 
</p>
<p>
     {!! $news['full'] !!}                  
</p>
@endsection