<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="{!! asset('public/client/templates/css/style.css') !!}" />
    <title>@yield('title')</title>
</head>
<body>
    <div id="layout">
        <div id="top">
            Banner
        </div>
        <div id="topmenu">
            <ul>
                <?php $cate = App\Models\Category::select('id','name','parent_id','slug')->get()->toArray(); ?>
                        <li><a href="{{ url('/') }}">Trang Chủ</a></li>
                @foreach($cate as $item)
                    @if($item['parent_id'] == 0)
                        <li><a href="{{ route('getCate',[ 'id'=>$item['id'],'slug'=>$item['slug'] ]) }}">{{ $item['name'] }}</a>
                        {{ ListCateClient($cate,$item['id']) }}
                    @endif
                        </li>
                @endforeach
            </ul>
        </div>
        <div id="content">
            <div id="left">
                <div id="leftmenu">
                    <h1>
                        Menu Chính
                    </h1>
                    <ul>
                        <li><a href="{{ url('/') }}">Trang Chủ</a></li>
                        @foreach($cate as $item)
                            @if($item['parent_id'] == 0)
                                <li><a href="{{ route('getCate',[ 'id'=>$item['id'],'slug'=>$item['slug'] ]) }}">{{ $item['name'] }}</a>
                                {{ ListCateClient($cate,$item['id']) }}
                            @endif
                                </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div id="main">
				@yield('content')            
			</div>
            <div class="clearfix"></div>
        </div>
        <div id="bottom">
            Copyright &copy; 2016 by Mạnh Thắng's
        </div>
    </div>
</body>
</html>