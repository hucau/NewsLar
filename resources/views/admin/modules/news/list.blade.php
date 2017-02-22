@extends('admin.master')
@section('title','Danh sách bài viết')
@section('content')
    <div id="main">
		<table class="list_table">
			<tr class="list_heading">
				<td class="id_col">STT</td>
				<td>Tiêu Đề</td>
                {{-- <td>Loại Tin</td> --}}
				<td>Tác Giả</td>
				<td>Thời Gian</td>
				<td class="action_col">Quản lý?</td>
			</tr>
            <?php $i = 0 ?>
            @foreach($news as $item)
            <?php $i++ ?>
			<tr class="list_data">
                <td class="aligncenter">{!! $i !!}</td>
                <td class="list_td aligncenter">{{ $item['title'] }}</td>
                {{-- <td class="list_td aligncenter">{{ $item->cate->name }}</td> --}}
                <td class="list_td aligncenter">{{ $item['author'] }}</td>
				<td class="list_td aligncenter">
                <?php \Carbon\Carbon::setLocale('vi'); ?>            
                {{ \Carbon\Carbon::createFromTimeStamp(strtotime($item['created_at']))->diffForHumans() }}
                </td>
                <td class="list_td aligncenter">
                    <a href="{{ route('getEditNews',['id'=>$item['id']]) }}"><img src="{{ asset('public/mt95_admin/templates/images/edit.png') }}" /></a>&nbsp;&nbsp;&nbsp;
                    <a class="del" href="{{ route('delNews',['id'=>$item['id']]) }}"><img src="{{ asset('public/mt95_admin/templates/images/delete.png') }}" /></a>
                </td>
            </tr>
            @endforeach
		</table>
	</div>
@endsection