<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="QuocTuan.Info" />
    <link rel="stylesheet" href="{!! asset('public/mt95_admin/templates/css/style.css') !!}" />
    <script type="text/javascript" src="{{ asset('public/mt95_admin/templates/js/ckeditor/ckeditor.js') }}"></script>
	<title>Admin Area :: @yield('title')</title>
</head>

<body>
<div id="layout">
    <div id="top">
        Admin Area :: Trang chính
    </div>
	<div id="menu">
		<table width="100%">
			<tr>
				<td>
					<a href="{{ url('mt_admin') }}">Trang chính</a> | <a href="{{ route('getAddUser') }}">Quản lý user</a> | <a href="{{ route('listCate') }}">Quản lý danh mục</a> | <a href="{{ route('ListNews') }}">Quản lý tin</a>
				</td>
				<td align="right">
					Xin chào {!! Auth::user()->username !!} | <a href="{!! url('logout') !!}">Logout</a>
				</td>
			</tr>
		</table>
	</div>
		@include('admin.blocks.error')
		@include('admin.blocks.result')
		@yield('content')
    <div id="bottom">
        Copyright © 2016 by ManhThang's
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="{{ asset('public/mt95_admin/templates/js/myjs.js') }}" type="text/javascript"></script>
</body>
</html>