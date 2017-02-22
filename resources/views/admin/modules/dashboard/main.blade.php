@extends('admin.master')
@section('title','Trang chủ')
@section('content')
	<div id="main">
		<table class="function_table" style="margin: 0px auto;">
			<tr>
				<td class="function_item user_add"><a href="{{ route('getAddUser') }}">Thêm user</a></td>
				<td class="function_item user_list"><a href="{{ route('ListUser') }}">Quản lý user</a></td>
				<td rowspan="3" class="statistics_panel">
					<h3>Thống kê:</h3>
					<ul>
						<li>Tổng số user: {{ $stt_user }}</li>
						<li>Tổng số danh mục: {{ $stt_category }}</li>
						<li>Tổng số tin: {{ $stt_news }}</li>
					</ul>
				</td>
			</tr>
			<tr>
				<td class="function_item cate_add"><a href="{{ route('getAddCate') }}">Thêm danh mục</a></td>
				<td class="function_item cate_list"><a href="{{ route('listCate') }}">Quản lý danh mục</a></td>
			</tr>
			<tr>
				<td class="function_item news_add"><a href="{{ route('getAddNews') }}">Thêm tin</a></td>
				<td class="function_item news_list"><a href="{{ route('ListNews') }}">Quản lý tin</a></td>
			</tr>
		</table>    
	</div>
@endsection